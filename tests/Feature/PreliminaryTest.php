<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Preliminary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PreliminaryTest extends TestCase
{
    use RefreshDatabase;

    // --- Helpers ---

    private function makeContestant(array $overrides = []): Preliminary
    {
        return Preliminary::create(array_merge([
            'contestant_number' => 1,
            'contestant_name'   => 'Test Contestant',
            'Address'           => 'Test Address',
            'closed_interview'  => 5,
            'photogenic'        => 3,
            'white_collection'  => 4,
            'tourism_video'     => 2,
            'talent'            => 6,
            'filipiniana'       => 1,
            'production_wear'   => 2,
            'production_number' => 3,
            'runway'            => 4,
            'miss_congeniality' => 0,
            'peoples_choice'    => 0,
            'total_ranking'     => 0,
            'rank'              => 0,
        ], $overrides));
    }

    private function admin(): User
    {
        return User::factory()->create();
    }

    // --- Schema / Model ---

    /** @test */
    public function miss_congeniality_column_exists_in_preliminary_event_table(): void
    {
        $this->makeContestant(['miss_congeniality' => 7]);

        $this->assertDatabaseHas('preliminary_event', [
            'contestant_number' => 1,
            'miss_congeniality' => 7,
        ]);
    }

    /** @test */
    public function miss_congeniality_defaults_to_zero(): void
    {
        $contestant = $this->makeContestant();

        $this->assertSame(0, $contestant->miss_congeniality);
    }

    /** @test */
    public function miss_congeniality_is_in_fillable(): void
    {
        $fillable = (new Preliminary)->getFillable();

        $this->assertContains('miss_congeniality', $fillable);
    }

    /** @test */
    public function peoples_choice_column_exists_in_preliminary_event_table(): void
    {
        $this->makeContestant(['peoples_choice' => 5]);

        $this->assertDatabaseHas('preliminary_event', [
            'contestant_number' => 1,
            'peoples_choice'    => 5,
        ]);
    }

    /** @test */
    public function peoples_choice_defaults_to_zero(): void
    {
        $contestant = $this->makeContestant();

        $this->assertSame(0, $contestant->peoples_choice);
    }

    /** @test */
    public function peoples_choice_is_in_fillable(): void
    {
        $fillable = (new Preliminary)->getFillable();

        $this->assertContains('peoples_choice', $fillable);
    }

    // --- Ranking Calculation ---

    /** @test */
    public function total_ranking_includes_miss_congeniality(): void
    {
        $scores = [
            'closed_interview'  => 13,
            'photogenic'        => 2,
            'white_collection'  => 5,
            'tourism_video'     => 1,
            'talent'            => 12,
            'filipiniana'       => 0,
            'production_wear'   => 2,
            'production_number' => 2,
            'runway'            => 1,
            'miss_congeniality' => 4,
            'peoples_choice'    => 3,
        ];

        $expected = array_sum($scores); // 45

        $this->makeContestant($scores);
        $this->actingAs($this->admin())->get(route('preliminary_ranking'));

        $this->assertDatabaseHas('preliminary_event', [
            'contestant_number' => 1,
            'total_ranking'     => $expected,
        ]);
    }

    /** @test */
    public function total_ranking_without_miss_congeniality_is_correct(): void
    {
        $scores = [
            'closed_interview'  => 10,
            'photogenic'        => 5,
            'white_collection'  => 5,
            'tourism_video'     => 5,
            'talent'            => 5,
            'filipiniana'       => 0,
            'production_wear'   => 2,
            'production_number' => 3,
            'runway'            => 5,
            'miss_congeniality' => 0,
            'peoples_choice'    => 0,
        ];

        $expected = array_sum($scores); // 40

        $this->makeContestant($scores);
        $this->actingAs($this->admin())->get(route('preliminary_ranking'));

        $this->assertDatabaseHas('preliminary_event', [
            'contestant_number' => 1,
            'total_ranking'     => $expected,
        ]);
    }

    // --- Route / Response ---

    /** @test */
    public function preliminary_ranking_route_returns_json_with_ranking_key(): void
    {
        $this->makeContestant();

        $response = $this->actingAs($this->admin())->get(route('preliminary_ranking'));

        $response->assertStatus(200);
        $response->assertJsonStructure(['ranking']);
    }

    /** @test */
    public function ranking_json_includes_miss_congeniality_field(): void
    {
        $this->makeContestant(['miss_congeniality' => 3]);

        $response = $this->actingAs($this->admin())->get(route('preliminary_ranking'));

        $response->assertStatus(200);
        $response->assertJsonPath('ranking.0.miss_congeniality', 3);
    }
}
<?php

namespace App\Http\Controllers;


use App\Models\Production;
use App\Models\Preliminary;
use App\Models\Coronation;
use App\Models\Finals;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FinalsController extends Controller
{
    public function final_form(){
        $currentjudge = Auth::user()->name;

        $candidates = Finals::select("*", $currentjudge . "_final")->get();
        $data = [];

        foreach ($candidates as $candidate) {
            $finalScores = $currentjudge . "_final";
            $data[] = [
                $candidate->contestant_number,
                $candidate->contestant_name,
                $candidate->$finalScores,
                $candidate->id,
            ];
        };
        return view('finals', [
            'data' => $data,
        ]);  
    }

    public function post_final_form(Request $request){
        // Add validation rules for each value in the request
        for ($i = 1; $i <= 12; $i++) {
            $rules["$i"] = 'numeric|max:10.0';
        }
        // Create the validator
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_final";

        for ($x = 1; $x <= 5; $x++) {
            $contestant = Finals::where('id', $x)->first();
            $contestant->update([$score => $request[$x]]);
            $contestant->save();
        }
        return response()->json(['message' => 'Grading Submitted']);
    }

    public function rank_final(){
        $currentjudge = Auth::user()->name;
        $score = $currentjudge . "_final";
        $rank  = $currentjudge . "_final_ranking";
        //generate ranking based on judge final score
        $rankContestants = Finals::select(['*', \DB::raw('RANK() OVER (ORDER BY '. $score .' DESC) AS row_id')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Finals::where('id', $item->id)->update([$rank => $item->row_id]); 
        }

        $sortedRanking = Finals::orderBy($rank, 'asc')->get();
        $data = [];
        foreach ($sortedRanking as $item){
            $data[] = [
                'ranking' => $item->$rank,
                'contestant_number' => $item->contestant_number,
                'contestant_name' => $item->contestant_name,
                'score' => $item->$score
            ];
        };
        return response()->json([
            'message' => 'final Ranking',
            'ranking' => $data
        ]);

    }
}

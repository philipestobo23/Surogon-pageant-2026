<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Preliminary;
use App\Models\Coronation;
use App\Models\Finals;

use App\Models\Top10;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
        if(Auth::user()->name != "admin"){
            return "Role not  Applicable";
        }
        return view("admin");

    }

    public function production_winners(){
        

        $allContestant = Production::all();

        foreach($allContestant as $contestant){
            $total_ranking = $contestant->Judge1_ranking + $contestant->Judge2_ranking +  $contestant->Judge3_ranking + $contestant->Judge4_ranking + $contestant->Judge5_ranking;
            Production::where('id', $contestant->id)->update([
                'total_ranking' => $total_ranking,
            ]);
        }
        $rankedProduction = Production::orderBy('total_ranking', 'asc')->get();
        // Initialize variables
        $rank = 1;
        $prevValue = null;
        foreach ($rankedProduction as $item) {
            // Check if the current value is the same as the previous one
            if ($prevValue !== null && $item->total_ranking != $prevValue) {
                $rank++;
            }
            // Update the rank column
            Production::where('id', $item->id)->update(['overall_ranking' => $rank]);
            // Update previous value
            $prevValue = $item->total_ranking;
        }

        $sortedProduction = Production::orderBy('overall_ranking', 'asc')->get();
        return response()->json([
            'message' => 'Grading Submitted',
            'rankedProduction' => $sortedProduction
        ]);
    }


    //ranking prejudge
    public function preliminary_ranking(){

        

        //update total_ranking
        $allContestant = Preliminary::all();
        foreach($allContestant as $contestant){
            $total_ranking = $contestant->closed_interview + $contestant->photogenic + $contestant->white_collection + $contestant->tourism_video + $contestant->talent + $contestant->filipiniana + $contestant->production_wear + $contestant->production_number + $contestant->runway;
            Preliminary::where('id', $contestant->id)->update([
                'total_ranking' => $total_ranking,
            ]);

        }

        //generate ranking based on total_ranking
        $rankContestants = Preliminary::select(['*', \DB::raw('RANK() OVER (ORDER BY total_ranking) AS row_id')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Preliminary::where('id', $item->id)->update(['rank' => $item->row_id]);
        }

        $sortedRanking = Preliminary::orderBy('rank', 'asc')->get();
        return response()->json([
            'message' => 'Prejudges Ranking',
            'ranking' => $rankContestants
        ]);

    }



    // //////////////////////////////// coronation ranking
    //swimsuit ranking genearation
    public function overall_swimsuit(){
        

        //update total_ranking
        $allContestant = Coronation::all();
        foreach($allContestant as $contestant){
            $total_ranking = $contestant->Judge1_swimsuit_ranking + $contestant->Judge2_swimsuit_ranking + $contestant->Judge3_swimsuit_ranking + $contestant->Judge4_swimsuit_ranking +$contestant->Judge5_swimsuit_ranking;
            Coronation::where('id', $contestant->id)->update([
                'overall_ranking_swimsuit' => $total_ranking,
            ]);
        }

        //generate ranking based on total_ranking
        $rankContestants = Coronation::select(['*', \DB::raw('RANK() OVER (ORDER BY overall_ranking_swimsuit) AS row_id ')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Coronation::where('id', $item->id)->update(['rank_swimsuit' => $item->row_id]);
        }

        $sortedRanking = Coronation::orderBy('rank_swimsuit', 'asc')->get();
        return response()->json([
            'message' => 'Preliminary Ranking',
            'ranking' => $sortedRanking
        ]);
    }

    public function overall_gown(){
        //update total_ranking
       
        $allContestant = Coronation::all();
        foreach($allContestant as $contestant){
            $total_ranking = $contestant->Judge1_gown_ranking + $contestant->Judge2_gown_ranking + $contestant->Judge3_gown_ranking + $contestant->Judge4_gown_ranking +$contestant->Judge5_gown_ranking;
            Coronation::where('id', $contestant->id)->update([
                'overall_ranking_gown' => $total_ranking,
            ]);
        }

        //generate ranking based on total_ranking
        $rankContestants = Coronation::select(['*', \DB::raw('RANK() OVER (ORDER BY overall_ranking_gown) AS row_id ')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Coronation::where('id', $item->id)->update(['rank_gown' => $item->row_id]);
        }

        $sortedRanking = Coronation::orderBy('rank_gown', 'asc')->get();
        return response()->json([
            'message' => 'overall gown Ranking',
            'ranking' => $sortedRanking
        ]);
    }


    public function overall_question(){
        //update total_ranking
        $allContestant = Top10::all();
        foreach($allContestant as $contestant){
            $total_ranking = $contestant->Judge1_question_ranking + $contestant->Judge2_question_ranking + $contestant->Judge3_question_ranking + $contestant->Judge4_question_ranking +$contestant->Judge5_question_ranking;
            Top10::where('id', $contestant->id)->update([
                'overall_ranking_question' => $total_ranking,
            ]);
        }

        //generate ranking based on total_ranking
        $rankContestants = Top10::select(['*', \DB::raw('RANK() OVER (ORDER BY overall_ranking_question) AS row_id ')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Top10::where('id', $item->id)->update(['rank_question' => $item->row_id]);
        }

        $sortedRanking = Top10::orderBy('rank_question', 'asc')->get();
        return response()->json([
            'message' => 'overall gown Ranking',
            'ranking' => $sortedRanking
        ]);
    }

    //// Round 1 categories: Swim Wear + Long Gown only
    public function overall_final(){
        //update total_ranking
        $allContestant = Coronation::all();
        foreach($allContestant as $contestant){
            $prejudge_total = Preliminary::where('id', $contestant->contestant_number)->first();

            $total_ranking = $contestant->rank_swimsuit + $contestant->rank_gown + $prejudge_total->rank;
            Coronation::where('id', $contestant->id)->update([
                'total_ranking' => $total_ranking,
                'preliminary_ranking' => $prejudge_total->rank
            ]);
        }

        //generate ranking based on total_ranking
        $rankContestants = Coronation::select(['*', \DB::raw('RANK() OVER (ORDER BY total_ranking) AS row_id ')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Coronation::where('id', $item->id)->update(['overall_ranking' => $item->row_id]);
        }

        $sortedRanking = Coronation::orderBy('overall_ranking', 'asc')->get();
        return response()->json([
            'message' => 'overall final Ranking',
            'ranking' => $sortedRanking
        ]);
    }



    /////Final Ranking ///////////////////////////////////////////////////////

    public function overall_winner(){
        //update total_ranking
        $allContestant = Finals::all();
        foreach($allContestant as $contestant){
            $total_ranking = $contestant->Judge1_final_ranking + $contestant->Judge2_final_ranking + $contestant->Judge3_final_ranking + $contestant->Judge4_final_ranking +$contestant->Judge5_final_ranking;
            Finals::where('id', $contestant->id)->update([
                'overall_ranking_final' => $total_ranking,
            ]);
        }

        //generate ranking based on total_ranking
        $rankContestants = Finals::select(['*', \DB::raw('RANK() OVER (ORDER BY overall_ranking_final) AS row_id ')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Finals::where('id', $item->id)->update(['rank_final' => $item->row_id]);
        }

        $sortedRanking = Finals::orderBy('rank_final', 'asc')->get();

        return response()->json([
            'message' => 'overall Final Ranking',
            'ranking' => $sortedRanking
        ]);
    }

    public function proceedToRound2(Request $request) {
        if (Auth::user()->name !== 'admin') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $request->validate([
            'contestant_ids'   => 'required|array|size:8',
            'contestant_ids.*' => 'required|integer',
        ]);

        $selected = Coronation::whereIn('id', $request->contestant_ids)->get();

        if ($selected->count() !== 8) {
            return response()->json(['message' => 'Could not find all selected contestants. Please try again.'], 422);
        }

        Top10::truncate();

        foreach ($selected as $contestant) {
            Top10::create([
                'contestant_number' => $contestant->contestant_number,
                'contestant_name'   => $contestant->contestant_name,
                'Address'           => $contestant->Address,
            ]);
        }

        return response()->json(['message' => 'Top 8 successfully set for Round 2! Judges can now score the Snap Talk round.']);
    }

    public function proceedToFinal(Request $request) {
        if (Auth::user()->name !== 'admin') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $request->validate([
            'contestant_ids'   => 'required|array|size:3',
            'contestant_ids.*' => 'required|integer',
        ]);

        $selected = Top10::whereIn('id', $request->contestant_ids)->get();

        if ($selected->count() !== 3) {
            return response()->json(['message' => 'Could not find all selected contestants. Please try again.'], 422);
        }

        Finals::truncate();

        foreach ($selected as $contestant) {
            Finals::create([
                'contestant_number' => $contestant->contestant_number,
                'contestant_name'   => $contestant->contestant_name,
                'Address'           => $contestant->Address,
            ]);
        }

        return response()->json(['message' => 'Top 3 successfully set for the Final Event! Judges can now score the Final round.']);
    }

}

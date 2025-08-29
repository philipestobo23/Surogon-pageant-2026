<?php

namespace App\Http\Controllers;

use App\Models\Top10;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Top10Controller extends Controller
{
    ////// question functions
    public function question_form(){
        $currentjudge = Auth::user()->name;

        $candidates = Top10::select("*", $currentjudge . "_question")->get();
        $data = [];

        foreach ($candidates as $candidate) {
            $questionScores = $currentjudge . "_question";
            $data[] = [
                $candidate->contestant_number,
                $candidate->contestant_name,
                $candidate->$questionScores,
                $candidate->id,
            ];
        };
        return view('question', [
            'data' => $data,
        ]);  
    }

    public function post_question_form(Request $request){
        // Add validation rules for each value in the request
        for ($i = 1; $i <= 10; $i++) {
            $rules["$i"] = 'numeric|max:10.0';
        }
        // Create the validator
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_question";

        for ($x = 1; $x <= 10; $x++) {
            $contestant = Top10::where('id', $x)->first();
            $contestant->update([$score => $request[$x]]);
            $contestant->save();
        }
        return response()->json(['message' => 'Grading Submitted']);
    }


    public function rank_question(){
        $currentjudge = Auth::user()->name;
        $score = $currentjudge . "_question";
        $rank  = $currentjudge . "_question_ranking";
        //generate ranking based on judge swimsuit score
        $rankContestants = Top10::select(['*', \DB::raw('RANK() OVER (ORDER BY '. $score .' DESC) AS row_id')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Top10::where('id', $item->id)->update([$rank => $item->row_id]); 
        }

        $sortedRanking = Top10::orderBy($rank, 'asc')->get();
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
            'message' => 'Gown Ranking',
            'ranking' => $data
        ]);

    }
}

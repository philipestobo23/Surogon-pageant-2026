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
        $inputData = $request->except('_token');

        // Build validation rules dynamically from submitted IDs
        $rules = [];
        foreach (array_keys($inputData) as $key) {
            $rules[$key] = 'numeric|max:10.0';
        }

        $validator = Validator::make($inputData, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_question";

        foreach ($inputData as $id => $value) {
            $contestant = Top10::find($id);
            if ($contestant) {
                $contestant->update([$score => $value]);
            }
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

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
        $inputData = $request->except('_token');

        $rules = [];
        foreach (array_keys($inputData) as $key) {
            $rules[$key] = 'numeric|max:10.0';
        }
        $validator = Validator::make($inputData, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_final";

        foreach ($inputData as $id => $value) {
            $contestant = Finals::find($id);
            if ($contestant) {
                $contestant->update([$score => $value]);
            }
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

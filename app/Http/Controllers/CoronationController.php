<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Preliminary;
use App\Models\Coronation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class CoronationController extends Controller
{
    protected $maxContestant;

    public function __construct()
    {
        $this->maxContestant = '20';
    }

    public function swimsuit_form(){
        $currentjudge = Auth::user()->name;

        $candidates = Coronation::select("*", $currentjudge . "_swimsuit")->get();
        $data = [];

        foreach ($candidates as $candidate) {
            $swimsuitScores = $currentjudge . "_swimsuit";
            $data[] = [
                $candidate->contestant_number,
                $candidate->contestant_name,
                $candidate->$swimsuitScores,
                $candidate->id,
            ];
        };
        return view('swimsuit', [
            'data' => $data,
        ]);  
    }

    public function post_swimsuit_form(Request $request){
        $inputData = $request->except('_token');

        $rules = [];
        foreach (array_keys($inputData) as $key) {
            $rules[$key] = 'numeric|max:10.0';
        }
        $validator = Validator::make($inputData, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_swimsuit";

        foreach ($inputData as $id => $value) {
            $contestant = Coronation::find($id);
            if ($contestant) {
                $contestant->update([$score => $value]);
            }
        }
        return response()->json(['message' => 'Grading Submitted']);
    }

    public function rank_swimsuit(){
        $currentjudge = Auth::user()->name;
        $score = $currentjudge . "_swimsuit";
        $rank  = $currentjudge . "_swimsuit_ranking";
        //generate ranking based on judge swimsuit score
        $rankContestants = Coronation::select(['*', \DB::raw('RANK() OVER (ORDER BY '. $score .' DESC) AS row_id')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Coronation::where('id', $item->id)->update([$rank => $item->row_id]); 
        }

        $sortedRanking = Coronation::orderBy($rank, 'asc')->get();
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
            'message' => 'Swimsuit Ranking',
            'ranking' => $data
        ]);

    }


    //////////////////////////// end of swinsuit controller


    /////////////////////////// gown function
    public function gown_form(){
        $currentjudge = Auth::user()->name;

        $candidates = Coronation::select("*", $currentjudge . "_gown")->get();
        $data = [];

        foreach ($candidates as $candidate) {
            $swimsuitScores = $currentjudge . "_gown";
            $data[] = [
                $candidate->contestant_number,
                $candidate->contestant_name,
                $candidate->$swimsuitScores,
                $candidate->id,
            ];
        };
        return view('gown', [
            'data' => $data,
        ]);  
    }

    public function post_gown_form(Request $request){
        $inputData = $request->except('_token');

        $rules = [];
        foreach (array_keys($inputData) as $key) {
            $rules[$key] = 'numeric|max:10.0';
        }
        $validator = Validator::make($inputData, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_gown";

        foreach ($inputData as $id => $value) {
            $contestant = Coronation::find($id);
            if ($contestant) {
                $contestant->update([$score => $value]);
            }
        }
        return response()->json(['message' => 'Grading Submitted']);
    }

    public function rank_gown(){
        $currentjudge = Auth::user()->name;
        $score = $currentjudge . "_gown";
        $rank  = $currentjudge . "_gown_ranking";
        //generate ranking based on judge swimsuit score
        $rankContestants = Coronation::select(['*', \DB::raw('RANK() OVER (ORDER BY '. $score .' DESC) AS row_id')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Coronation::where('id', $item->id)->update([$rank => $item->row_id]); 
        }

        $sortedRanking = Coronation::orderBy($rank, 'asc')->get();
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

    /////////////////end of gown functions



    




    public function production_wear_form(){
        $currentjudge = Auth::user()->name;

        $candidates = Coronation::select("*", $currentjudge . "_production_wear")->get();
        $data = [];

        foreach ($candidates as $candidate) {
            $production_wearScores = $currentjudge . "_production_wear";
            $data[] = [
                $candidate->contestant_number,
                $candidate->contestant_name,
                $candidate->$production_wearScores,
                $candidate->id,
            ];
        };
        return view('production_wear', [
            'data' => $data,
        ]);  
    }

    public function post_production_wear_form(Request $request){
        $inputData = $request->except('_token');

        $rules = [];
        foreach (array_keys($inputData) as $key) {
            $rules[$key] = 'numeric|max:10.0';
        }
        $validator = Validator::make($inputData, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $score = Auth::user()->name . "_production_wear";

        foreach ($inputData as $id => $value) {
            $contestant = Coronation::find($id);
            if ($contestant) {
                $contestant->update([$score => $value]);
            }
        }
        return response()->json(['message' => 'Grading Submitted']);
    }

    public function rank_production_wear(){
        $currentjudge = Auth::user()->name;
        $score = $currentjudge . "_production_wear";
        $rank  = $currentjudge . "_production_wear_ranking";
        //generate ranking based on judge production_wear score
        $rankContestants = Coronation::select(['*', \DB::raw('RANK() OVER (ORDER BY '. $score .' DESC) AS row_id')])->get();
        foreach ($rankContestants as $item) {
            // Update the rank column
            Coronation::where('id', $item->id)->update([$rank => $item->row_id]); 
        }

        $sortedRanking = Coronation::orderBy($rank, 'asc')->get();
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
            'message' => 'production_wear Ranking',
            'ranking' => $data
        ]);

    }


    //////////////////////////// end of swinsuit controller

}

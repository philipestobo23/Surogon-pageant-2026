<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(Auth::user()->name == 'admin'){
            return redirect()->route('admin');
        }
        return view('home');
    }

    public function production_grading()
    {
        $currentjudge = Auth::user()->name;
        $candidates = Production::select('contestant_number', 'contestant_name', Auth::user()->name)->get();
        $data = [];

        foreach ($candidates as $candidate) {
            $data[] = [
                $candidate->contestant_number,
                $candidate->contestant_name,
                $candidate->$currentjudge
            ];
        };
        return view('production_grading', [
            'data' => $data,
        ]);
    }

    public function postProductionGrading(Request $request)
    {
        // Add validation rules for each value in the request
        for ($i = 1; $i <= 22; $i++) {
            $rules["$i"] = 'numeric|max:10.0';
        }
        // Create the validator
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $currentjudge = Auth::user()->name;
        // dd($request[1]);
        for ($x = 1; $x <= 21; $x++) {
            $contestant = Production::where('contestant_number', $x)->first();
            $contestant->update([$currentjudge => $request[$x]]);
            $contestant->save();
        }
        return response()->json(['message' => 'Grading Submitted']);
    }

    public function postProductionRanking()
    {
        $currentjudge = Auth::user()->name;
        $ranking = Production::orderBy($currentjudge, 'desc')->get();

        // Initialize variables
        $rank = 1;
        $prevValue = null;
        
        foreach ($ranking as $item) {
            // Check if the current value is the same as the previous one
            if ($prevValue !== null && $item->$currentjudge != $prevValue) {
                $rank++;
            }
            // Update the rank column
            Production::where('id', $item->id)->update([$currentjudge . "_ranking" => $rank]);
            // Update previous value
            $prevValue = $item->$currentjudge;
        }

        $sortedRank = Production::orderBy($currentjudge . "_ranking", 'asc')->get();
        $rankData = [];
        foreach($sortedRank as $rank){
            $judge = Auth::user()->name . "_ranking";
            $rankData[] = [
                'ranking' => $rank->$judge,
                'score' => $rank->$currentjudge,
                'contestant_number' => $rank->contestant_number,
                'contestant_name' => $rank->contestant_name,
            ];
        };
        return response()->json(['rankings' => $rankData]);
    }
}

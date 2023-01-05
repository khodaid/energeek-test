<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use App\Models\Skill;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::with('SkillSet')->get();
        return response()->json($candidates, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = Job::all();
        $skill = Skill::all();

        $respone = [
            'job' => $job,
            'skill' => $skill
        ];

        return response()->json($respone, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'job' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:candidates,email',
                'phone' => 'required|regex:/^[0-9]*$/|unique:candidates,phone',
                'year' => 'required',
                'skill_set' => 'required'
            ]);
            $apply = new Candidate();
            $apply->job_id = $request->job;
            $apply->name = $request->name;
            $apply->email = $request->email;
            $apply->phone = $request->phone;
            $apply->year = $request->year;
            try {
                $apply->save();
                $apply->SkillSet()->attach($request->skill_set);
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json("skill set sama", 422);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage());
        }

        DB::commit();
        return response()->json($apply, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }

    public function checkEmail(Request $request)
    {
        try {
            $valid = $request->validate([
                'email' => 'required|email|unique:candidates,email|regex:/(.+)@(.+)\.(.+)/i'
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
        return response()->json($valid);
    }
}

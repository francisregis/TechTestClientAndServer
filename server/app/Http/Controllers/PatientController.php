<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all()->toArray();
        return array_reverse($patients);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $patient = new Patient(['name' => $request->input('name'), 'detail' => $request->input('detail'), 'mobile' => $request->input('mobile') ]);
        $patient->save();
        return response()->json($patient);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $patient = Patient::find($id);
        return response()->json($patient);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $patient = Patient::find($id);
        $patient->update($request->all());
        return response()->json($patient);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $patient = Patient::find($id);
        $patient->delete();
        return response()->json('Patient deleted!');
    }
}

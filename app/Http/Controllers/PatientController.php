<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Patient;
use  App\Http\Resources\Patient\PatientResource;
use  App\Http\Requests\Patientrequest;




class PatientController extends Controller
{
    public function __construct(){

        $this->middleware('auth:api')->except('index','show','addPatient','postPatient');

    }

    public function addPatient(){

        return view('patient.add-patient');
    }

    public function postPatient(Request $request){


        $name    = $request->input('name');
        $number  = $request->input('number');
        $address = $request->input('address');
        $email   = $request->input('email');

        $newPatient = new Patient();

        $newPatient->name         = $name ;
        $newPatient->phone_number = $number;
        $newPatient->email        = $email;
        $newPatient->address      = $address;
        $newPatient->save();

        return back();



    }

    public function index(){

        return Patient::all();
    }

    public function show(Patient $patient){

        return new PatientResource($patient);
    }

    public function store(PatientRequest $request){


        $name    = $request->input('name');
        $number  = $request->input('phone_number');
        $address = $request->input('address');
        $email   = $request->input('email');

        $newPatient = new Patient();

        $newPatient->name         = $name ;
        $newPatient->phone_number = $number;
        $newPatient->email        = $email;
        $newPatient->address      = $address;
        $newPatient->save();

        return response([
            'data' => new PatientResource($newPatient)
        ],201);
    }

    public function update(Request $request , Patient $patient){
        $patient->update($request->all());

       return response([
        'data' => new PatientResource($patient)
    ],201);
    
    }
}

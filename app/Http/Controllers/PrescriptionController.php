<?php

namespace App\Http\Controllers;

use App\Model\Prescription;
use Illuminate\Http\Request;
use App\Model\Patient;
use App\Model\Drug;
use  App\Http\Resources\Prescription\PrescriptionResource;
use  App\Http\Requests\Prescriptionrequest;




class PrescriptionController extends Controller
{
    public function __construct(){

        $this->middleware('auth:api')->except('index','show','addPatient','postPatient');

    }

   public function  addPrescription($id){


       $patient = Patient::where('id',$id)->firstOrfail();
       $drugs =  Drug::all();
       return view('prescription.add')->with('patient',$patient)->with('drugs',$drugs);
   }


   public function postPrescription(Request $request){


             $patient_id    = $request->input('name');
             $ailment       = $request->input('ailment');
             $drug_id       = $request->input('drugs');

             $newPrescription = new Prescription();
             $newPrescription->patient_id = $patient_id;
             $newPrescription->ailment    = $ailment;
             $newPrescription ->drug_id   = $drug_id;
             $newPrescription->save();


             $drugcount = Drug::where('id',$drug_id)->pluck('count')->firstOrfail();

             return $drugcount;
             return back();

   }

   public function index(){

       return Prescription::all();
   }

   public function show(Prescription $prescription){

       return new PrescriptionResource($prescription);
   }


   public function store(PrescriptionRequest $request){

    $patient_id    = $request->input('patient_id');
    $ailment       = $request->input('ailment');
    $drug_id       = $request->input('drug_id');

    $newPrescription = new Prescription();
    $newPrescription->patient_id = $patient_id;
    $newPrescription->ailment    = $ailment;
    $newPrescription ->drug_id   = $drug_id;
    if($drug_id){
        $drugcount = Drug::where('id',$drug_id)->firstOrfail();
        $newDrugCount =  $drugcount->count - 1;

        Drug::where('id',$drug_id)->update([
            'count'=> $newDrugCount,
        ]);

       }
    $newPrescription->save();
    return response([
        'data' => new PrescriptionResource($newPrescription)
    ],201);

   }


   public function update(Request $request , Prescription $prescription){
    $prescription->update($request->all());

   return response([
    'data' => new PrescriptionResource($prescription)
    ],201);
}

}

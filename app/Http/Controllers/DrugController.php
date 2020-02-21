<?php

namespace App\Http\Controllers;

use App\Model\Drug;
use Illuminate\Http\Request;
use  App\Http\Resources\Drug\DrugResource;
use  App\Http\Requests\Drugrequest;

class DrugController extends Controller
{

    public function addDrug(){

        return view('drug.add-drug');
    }

    public function postDrug(Request $request){
        $drugName   = $request->input('name');
        $drugCount  = $request->input('drug_count');

        $newDrug = new Drug();
        $newDrug->name = $drugName;
        $newDrug->count = $drugCount;
        $newDrug->save();
        return back();

    }

    public function index(){

        return Drug::all();
    }

    public function show(Drug $drug){


        return new DrugResource($drug);
    }


    public function store(DrugRequest $request){

        if($request->expectsJson()){

                $drugName   = $request->input('name');
                $drugCount  = $request->input('count');

                $newDrug = new Drug();
                $newDrug->name = $drugName;
                $newDrug->count = $drugCount;
                $newDrug->save();


                return response([
                    'data' => new DrugResource($newDrug)
                ],201);

        }



    }

    public function update(Request $request , Drug $drug){
        $drug->update($request->all());

       return response([
        'data' => new DrugResource($drug)
    ],201);
    }




}

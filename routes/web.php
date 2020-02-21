<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Patients
Route::get('add/patient/','PatientController@addPatient');
Route::post('post/patient','PatientController@postPatient');


//Prescription
Route::get('add/prescription/{id}','PrescriptionController@addPrescription');
Route::POST('post/prescription','PrescriptionController@postPrescription');


//Drug
Route::get('add/drug','DrugController@addDrug');
Route::post('post/drug','DrugController@postDrug');

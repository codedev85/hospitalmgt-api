<?php

namespace App\Model;
use App\Model\Prescription;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'name','email','phone_number','address'
    ];
    public function prescription(){
        return $this->belongsTo(Prescription::class);
    }
}

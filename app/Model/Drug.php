<?php

namespace App\Model;
use App\Model\Prescription;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    //
    protected $fillable = [
        'name','count'
    ];
    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
}

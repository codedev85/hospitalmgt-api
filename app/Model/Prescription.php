<?php

namespace App\Model;

use App\Model\Drug;
use App\Model\Patient;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    protected $fillable = [
        'drug_id','patient_id','ailment'
    ];

        public function drugs(){
            return $this->hasMany(Drug::class);
        }

        public function patients(){
            return $this->hasMany(Patient::class);
        }
}

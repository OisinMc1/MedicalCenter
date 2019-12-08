<?php

// Visit model

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //One to Many Relationship with Patient

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }

    //One to Many Relationship with Doctor

    public function doctor()
    {
      return $this->belongsTo('App\Doctor');
    }
}

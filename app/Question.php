<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function responses()
    {
        return $this->hasMany('App\SurveyResponse');
    }
}

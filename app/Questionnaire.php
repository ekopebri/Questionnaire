<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/questionnaires/' . $this->id;
    }

    public function publicPath()
    {
        return '/surveys/' . $this->id . '-' . Str::slug($this->title);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['learning_style_id', 'title', 'value', 'user_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function learningStyles()
    {
        return $this->belongsTo(LearningStyle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    //public function setTitleAttribute($value)
    //{
    //    #Conviente un string en mayúsculas.
    //    $this->attributes['title'] = trim(mb_strtoupper($value));
    //}

    public function getUserAttribute()
    {
        return $this->user->name();
    }
}

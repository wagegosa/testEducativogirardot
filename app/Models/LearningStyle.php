<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningStyle extends Model
{
    use HasFactory;

    protected $fillable = ['learning_style'];

    protected $dates = ['created_at', 'updated_at'];

    public function getLearningStyleAttribute($value)
    {
        #ucfirst — Convierte el primer caracter de una cadena a mayúsculas
        $this->attributes['learning_style'] = trim(mb_strtolower(ucfirst($value)));
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

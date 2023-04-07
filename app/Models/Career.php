<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = ['career'];

    protected $dates = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function setCareerAttribute($value)
    {
        #Convierte un string en mayúsculas.
        $this->attributes['career'] = trim(mb_strtoupper($value));
    }
}

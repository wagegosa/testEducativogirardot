<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'date_birth',
        'gender',
        'identity_number',
        'career_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeName($query, $name)
    {
        if ($name){
            return $query->where('name', 'LIKE', '%'.$name.'%');
        }
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function getGenderAttribute($value)
    {
        return $value == 'male' ? 'Masculino' : 'Femenino';
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_birth)->age;
    }

    public function getFormatDateAttribute()
    {
        #https://www.digitalocean.com/community/tutorials/easier-datetime-in-laravel-and-php-with-carbon
        return Carbon::parse($this->date_birth)->toFormattedDateString();
    }

    public function getPictureGenderAttribute()
    {
        return $this->gender == 'male' ? asset('img/nobody_m.original.jpg') : asset('img/nobody_f.original.jpg');
    }
}

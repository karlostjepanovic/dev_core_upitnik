<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = false;

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'initial_password',
        'oib',
        'email',
        'is_admin'
    ];

    public function mySchools() {
        return $this->hasMany(School::class, 'supervisor_id');
    }

    public function myQuestionnaires()
    {
        return $this->hasMany(StudentQuestionnaire::class)->orderBy('id', 'desc');
    }

    public function myDoneQuestionnaires()
    {
        return $this->belongsToMany(Questionnaire::class, 'student_questionnaires')->where('is_done', true)->withPivot(Schema::getColumnListing('student_questionnaires'));
    }
}

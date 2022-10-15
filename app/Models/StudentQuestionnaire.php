<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuestionnaire extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'questionnaire_id',
        'is_done',
    ];

    protected $appends = ['questionnaire', 'answers'];
    public function getQuestionnaireAttribute() {
        return $this->getQuestionnaireData()->with('items')->first();
    }
    public function getAnswersAttribute() {
        return $this->getAnswers()->get();
    }

    public function getQuestionnaireData()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }

    public function getAnswers()
    {
        return $this->hasMany(Answer::class);
    }
}

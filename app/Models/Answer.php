<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'student_questionnaire_id',
        'item_id',
        'points'
    ];

    protected $appends = ['item'];
    public function getItemAttribute() {
        return $this->item()->first();
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}

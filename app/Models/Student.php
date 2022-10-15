<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'school_class_id',
    ];

    protected $appends = ['user'];
    public function getUserAttribute() {
        return $this->getUserData()->first();
    }

    public function getUserData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'address',
        'place',
        'oib',
        'supervisor_id',
    ];

    public function supervisor()
    {
        return $this->hasOne(User::class, 'id', 'supervisor_id');
    }

    public function getClasses()
    {
        return $this->hasMany(SchoolClass::class)->orderBy('name');
    }
}

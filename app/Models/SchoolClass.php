<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class SchoolClass extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'school_id',
    ];

    public function getStudents()
    {
        return $this->belongsToMany(
            User::class,
            'students',
            'school_class_id',
            'user_id')
            ->withPivot(Schema::getColumnListing('students'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'is_locked',
        'target_group',
    ];

    protected $appends = ['target_group_value'];
    public function getTargetGroupValueAttribute() {
        return $this->attributes['target_group_value'] = [
            'M' => 'muške osobe',
            'Ž' => 'ženske osobe'
        ][$this->target_group];
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

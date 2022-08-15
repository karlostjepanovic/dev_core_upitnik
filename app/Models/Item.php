<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'question',
        'dimension',
        'ascending_order',
        'questionnaire_id',
    ];

    protected $appends = ['dimension_value'];
    public function getDimensionValueAttribute() {
        return $this->attributes['target_group_value'] = [
            'W' => 'W - subjektivna dobrobit',
            'P' => 'P - problemi/simptomi',
            'F' => 'F - svakodnevno funkcioniranje',
            'R' => 'R - rizik',
        ][$this->dimension];
    }
}

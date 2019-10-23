<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_date', 'end_date',
    ];

    //Many to Many Relation with items
    public function items(){

    	return $this->belongsToMany('App\Models\Item');
    }

    //Has only one relation with task
    public function task(){

        return $this->hasOne('App\Models\Task');
    }

}

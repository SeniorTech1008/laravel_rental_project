<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    //Many to Many Relation with checklists
    public function checklists(){

    	return $this->belongsToMany('App\Models\Checklist');
    }

    public function tasks(){

        return $this->belongsToMany('App\Models\Task');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'checklist_id',
    ];
    //Belongs to one Relation with user
    public function user(){

    	return $this->belongsTo('App\User');
    }

    //Belongs to relation with checklist
    public function checklist(){

    	return $this->belongsTo('App\Models\Checklist');
    }

    public function items(){

    	return $this->belongsToMany('App\Models\Item');
    }

    //task items by checklist_id
    public function item_task($checklist_id){

    	return $this->with(['items' => function($query) use($checklist_id){

    		return $query->where('checklist_id', $checklist_id);
    	}]);
    }
}

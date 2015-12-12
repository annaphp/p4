<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function task(){
        //project has many Tasks
        return $this->hasMany('\App\Task');

    }

    public function user(){
        return $this->belongsTo('\App\User');
    }

    protected $dates = [ 'due_date'];
}

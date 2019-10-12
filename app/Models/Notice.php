<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['user_id', 'title', 'body', 'status', 'file', 'priority'];

    public function users(){
    	return $this->belongsTo('App\User');
    }
}

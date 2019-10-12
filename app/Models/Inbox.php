<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [ 'name', 'subject', 'email', 'details', 'status'];
}

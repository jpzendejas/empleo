<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernmentSession extends Model
{
    protected $fillable = ['title','description','link','start_date','session_kind_id'];
}

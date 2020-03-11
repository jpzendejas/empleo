<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentSession extends Model
{
    protected $fillable = ['document_name','main_document','government_session_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePhone extends Model
{
    protected $fillable = ['name', 'job','address','phone','email','department'];
}

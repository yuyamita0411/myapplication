<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

     protected $fillable = [
         'title',
         'description',
         'starttime',
         'endtime',
         'groupid',
         'taskid',
         'companyid'
    ];
}

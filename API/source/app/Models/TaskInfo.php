<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskInfo extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'taskname',
        'userid',
        'username',
        'fromuserid',
        'fromusername',
        'groupname',
        'deadline',
        'status',
        'startdate',
        'companyid'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'title',
        'passage',
        'fromuserid',
        'fromuser',
        'touserid',
        'touser',
        'companyid',
        'created_at'
    ];
}

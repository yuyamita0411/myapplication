<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupInfo extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'groupname',
        'cid',
        'cname',
        'groupdescription',
        'companyid',
        'created_at'
    ];
}

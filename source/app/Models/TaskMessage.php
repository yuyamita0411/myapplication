<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'taskid',
        'commenttitle',
        'commentpassage',
        'created_at',
        'updated_at'
    ];
}

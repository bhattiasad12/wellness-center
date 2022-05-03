<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'color',
        'created_at',
        'updated_at',
        'updated_by',
        'created_by',
        'deleted_at',
    ];

    use HasFactory, SoftDeletes;
}

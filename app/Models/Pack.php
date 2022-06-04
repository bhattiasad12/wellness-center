<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'pack_name',
        'services_id',
        'session',
        'pack_price',
        'user_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
}

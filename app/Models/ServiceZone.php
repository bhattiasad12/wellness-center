<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceZone extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'service_id',
        'time_limit',
        'price',
        'zone',
        'user_id',
        'created_at',
        'updated_at',
        'updated_by',
        'created_by',
        'deleted_at',
    ];
}

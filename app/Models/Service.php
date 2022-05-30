<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'machine_id',
        'hand_id',
        'service_name',
        'created_at',
        'updated_at',
        'updated_by',
        'created_by',
        'deleted_at',
    ];
}

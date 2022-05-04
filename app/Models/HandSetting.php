<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class HandSetting extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'machine_id',
        'hand_id',
        'setting_name',
        'min',
        'max',
        'start',
        'user_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
}

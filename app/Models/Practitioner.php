<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Practitioner extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'days',
        'check_in',
        'check_out',
        'user_id',
        'created_by',

    ];
}

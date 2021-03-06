<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'profile_pic',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'age',
        'source',
        'neighborhood',
        'city',
        'zip_code',
        'user_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
}

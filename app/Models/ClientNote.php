<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientNote extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'client_id',
        'note',
        'user_id',
        'user_name',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
}

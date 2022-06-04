<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'client_id',
        'pack_id',
        'type',
        'room_id',
        'practitionner_id',
        'machine_id',
        'hand_id',
        'service_id',
        'setting_id',
        'zone',
        'session',
        'session_price',
        'promotion',
        'total_service_amount',
        'room_time',
        'check_in',
        'check_out',
        'status',
        'paid',
        'unpaid',
        'note',
        'appointment_start',
        'appointment_end',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
}

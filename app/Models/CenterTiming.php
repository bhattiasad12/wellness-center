<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CenterTiming extends Model
{
    // public $table = "center_timing";
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'practitioner_day_id',
        'start_time',
        'end_time',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',

    ];
    public function day()
    {
        return DB::select(DB::raw("SELECT ct.`id`,pd.`day`,ct.`start_time`,ct.`end_time` FROM center_timings ct 
        INNER JOIN `practitioners_days` pd ON pd.`id` = ct.`practitioner_day_id` WHERE ct.`deleted_at` IS NULL "));
    }
}

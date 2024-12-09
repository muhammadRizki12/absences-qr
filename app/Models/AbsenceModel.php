<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceModel extends Model
{
    use HasFactory;
    protected $table = 'absences';

    protected $fillable = [
        'absence_datetime',
        'status',
        'schedule_id'
    ];
    public $timestamps = false;
}

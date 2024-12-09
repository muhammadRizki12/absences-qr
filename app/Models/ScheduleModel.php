<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    use HasFactory;
    protected $table = 'schedules';

    protected $fillable = [
        'day',
        'entry_time',
        'out_time',
        'user_id',
        'class_id'
    ];
    public $timestamps = false;

    // relation table 'classes'
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}

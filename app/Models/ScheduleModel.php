<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    use HasFactory;
    protected $table = 'schedules';

    protected $fillable = [
        'hari',
        'waktu_masuk',
        'waktu_keluar',
        'user_id',
        'class_id'
    ];
    public $timestamps = false;

    // relasi ke tabel 'classes'
    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}

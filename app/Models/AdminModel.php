<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'email',
        'nama',
        'password'
    ];
    public $timestamps = false;
}

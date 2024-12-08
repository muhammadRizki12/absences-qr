<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
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

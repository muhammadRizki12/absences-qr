<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        "email",
        "password",
        "nama",
        "nip",
        "jenis_kelamin",
        "jenjang_jabatan",
        "pangkat",
        "golongan",
        "jabatan_tugas_utama",
        "jabatan_tugas_tambahan",

    ];
    public $timestamps = false;
}

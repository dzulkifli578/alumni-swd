<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "akun";

    protected $primaryKey = "id";
    public $incrementing = true;

    protected $fillable = [
        "nama_pengguna",
        "nis",
        "kata_sandi",
        "peran",
        "foto"
    ];

    public $timestamps = true;
}

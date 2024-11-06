<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumni";

    protected $primaryKey = "id";
    public $incrementing = true;

    protected $fillable = [
        "nama_lengkap",
        "jenis_kelamin",
        "tahun_lulus",
        "jurusan_id"
    ];

    public $timestamps = true;

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, "jurusan_id");
    }
}

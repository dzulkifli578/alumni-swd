<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";

    protected $primaryKey = "id";
    public $incrementing = true;

    protected $fillable = [
        "nama",
        "deskripsi",
        "logo",
        "tautan"
    ];

    public $timestamps = true;

    public function alumni()
    {
        return $this->hasMany(Alumni::class, "jurusan_id");
    }
}

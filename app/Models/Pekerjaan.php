<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;


class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaans';
    protected $fillable = ['posisi', 'deskripsi', 'lokasi', 'gaji', 'tanggal_posting'];

    public function pelamar()
    {
        return $this->belongsToMany(Pelamar::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pelamar extends Model
{
    use HasFactory;
    protected $table = 'pelamars';
    protected $fillable = ['nama_pelamar', 'email','alamat','nomor_telepon','pengalaman_kerja','pendidikan_terakhir', 'keterampilan', 'pekerjaan_id'];

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }
}

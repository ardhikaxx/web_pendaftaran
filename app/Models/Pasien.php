<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    /**
     * Nama tabel di database yang akan digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'pasien';

    /**
     * Atribut yang dapat diisi massal.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
        'penyakit',
    ];

    /**
     * Atribut yang harus di-cast ke jenis tertentu.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
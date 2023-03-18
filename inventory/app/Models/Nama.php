<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nama extends Model
{
    use HasFactory;

    protected $primaryKey = "kode_barang";
    public $incrementing = false;
    protected $keyType = "string";
    protected $table = "namas";
    protected $with = ['tipe'];
    protected $guarded = ['jumlah_barang'];

    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('no_barang', 'like', '%' . request('search') . '%')
                ->orWhere('kondisi', 'like', '%' . request('search') . '%')
                ->orWhere('tanggal_masuk', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%')
                ->orWhere('lokasi', 'like', '%' . request('search') . '%')
                ->orWhere('sumber', 'like', '%' . request('search') . '%')
                ->orWhere('nama_kode_barang', 'like', '%' . request('search') . '%');
        }
    }

    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}

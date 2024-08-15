<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klasifikasi extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'klasifikasis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_klasifikasi',
        'klasifikasi',
        'kode_subkategori',
        'subkategori',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function klasifikasiMateris()
    {
        return $this->belongsToMany(Materi::class);
    }
}

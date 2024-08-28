<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'materis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sub_bab_id',
        'klasifikasi_id',
        'keterampilan_apoteker',
        'kode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function sub_bab()
    {
        return $this->belongsTo(SubBab::class, 'sub_bab_id');
    }

    public function klasifikasis()
    {
        return $this->belongsToMany(Klasifikasi::class);
    }
}

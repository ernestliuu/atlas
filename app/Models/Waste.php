<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;
    protected $fillable = [
        'merk',
        'kategori',
        'jenis_sampah',
        'produsen_sampah',
        'berat_sampah',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi mass-assignment
    protected $fillable = [
        'name', 'description', 'date', 'location', 'status',
    ];

    // Menentukan tipe data untuk tanggal
    protected $casts = [
        'date' => 'date',
    ];
}

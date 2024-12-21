<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi mass-assignment
    protected $fillable = [
        'name', 'nama_pelukis', 'year', 'description', 'tipe_lukisan',
        'status', 'condition', 'image',
    ];
}

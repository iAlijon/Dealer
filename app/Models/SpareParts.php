<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    use HasFactory;

    protected $table = 'spare_parts';
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'category_id',
        'photo',
        'info',
        'status'
    ];

    protected $casts = [
      'photo' => 'array'
    ];
}

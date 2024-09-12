<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name_uz', 'name_ru', 'name_en', 'category_id'];
    protected $casts = [
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'name_uz' => 'string',
        'name_ru' => 'string',
        'name_en' => 'string',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

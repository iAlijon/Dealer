<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [ 'id', 'name_uz', 'name_ru', 'name_en'];
    protected $casts = ['id' => 'integer', 'name_uz' => 'string','name_ru' => 'string','name_en' => 'string',];

    public function subCategory()
    {
       return $this->hasMany(SubCategory::class);
    }

}

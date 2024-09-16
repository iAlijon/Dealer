<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCategorySelect($id)
    {
        $sub_category =  SubCategory::where('category_id', $id)->get();
        return response()->json($sub_category);
    }
}

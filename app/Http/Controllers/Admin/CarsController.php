<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarsRequest;
use App\Models\Cars;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Admin\CarRepository;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    protected $repo;
    public function __construct(CarRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.car-list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'asc')->get();
        $sub_category_id = SubCategory::orderBy('id', 'asc')->get();
        return view('admin.car-list.create', ['categories' => $category, 'sub_categories' => $sub_category_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsRequest $request)
    {
        $input = $this->repo->create($request->validated());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subCategorySelect($id)
    {
        $result = SubCategory::where('category_id', $id)->get();
        return response()->json($result);
    }
}

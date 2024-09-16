<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarsRequest;
use App\Http\Resources\Admin\CarsItemResource;
use App\Models\Cars;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Admin\CarRepository;
use App\Traits\Upload;
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
        $models = $this->repo->index();
        return view('admin.car-list.index', ['items' => $models]);
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
        $carsItem = Cars::create($request->validated());
        $carsItem->upload($request);
        return redirect()->route('cars-list.index')->with(['message' => 'Success info']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $models = Cars::whereId($id)->get();
        return view('admin.car-list.show', compact('models'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carId = Cars::find($id);
        $categories = Category::select('id', 'name_uz')->get();
        $sub_categories = SubCategory::select('id', 'name_uz')->get();
        return view('admin.car-list.edit', ['carItem' => $carId, 'categories' => $categories, 'sub_categories' => $sub_categories]);
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
}

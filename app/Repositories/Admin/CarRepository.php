<?php


namespace App\Repositories\Admin;


use App\Models\Cars;
use App\Repositories\BaseRepository;
use App\Traits\Upload;

class CarRepository extends BaseRepository
{
    use Upload;

    public function __construct()
    {
        $this->model = new Cars();
    }

    public function index()
    {
        return $this->model->orderBy('id', 'desc')->with('category', 'subCategory')->paginate(20);
    }
}

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
        return $this->model = $this->model->orderBy('id', 'desc')->with('category', 'subCategory')->get();
    }

    public function create($data)
    {
        $this->model->model = $data['model'];
        $this->model->price = $data['price'];
        $this->model->category_id = $data['category_id'];
        $this->model->sub_category_id = $data['sub_category_id'];
        $this->model->color = $data['color'];
        $this->model->info = infoByDomDocment($data['info']);
        if ($data->hasFile('photo'))
        {
            $uploadedFile = $data->file('photo');
            $directory = 'admin/cars';
            $filename = $this->upload($uploadedFile, $directory);
            if ($filename)
                $this->model->photo = $filename;
        }
        if ($this->model->save()) {
            return $this->model;
        } else {
            return back()->with(['message' => 'Ma\'lumot saqlanmadi']);
        }
    }


}

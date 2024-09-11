<?php


namespace App\Repositories\Admin;


use App\Models\Cars;
use App\Repositories\BaseRepository;

class CarRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Cars();
    }

    public function create($data)
    {
        $arr = [];
        foreach ($data['info'] as $info)
        {
            if ($info['file']){
                $image = UploadRepository::upload($info['file'], 'cars');
            }
        }
        $model = $this->model->create([
            'model' => $data['model'],
            'category_id' => $data['category_id'],
            'sub_category_id' => $data['sub_category_id'],
            'color' => $data['color'],
            'info' => $data['info'],
            'photo' => UploadRepository::upload($data['photo'], 'cars')
        ]);
        if ($model)
        {
            return $model;
        }else{
            return back()->with(['message' => 'Ma\'lumot saqlanmadi']);
        }
    }



}

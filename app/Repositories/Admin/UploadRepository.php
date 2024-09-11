<?php


namespace App\Repositories\Admin;


use Illuminate\Support\Facades\Storage;

class UploadRepository
{
    public function upload($file, $folder)
    {
        $app_url = config('app.url');
        $dirName = 'public/'.$folder;
        $fileName =time().$file['photo'];
        $path =$dirName.'/'.$fileName;
        if (Storage::put($path, 'public')){
            return $app_url.'/'.$folder.'/'.$fileName;
        }else{
            return null;
        }
    }

}

<?php


namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Upload
{

    public function upload($request)
    {
        if ($request->file('photo')) {
            if (isset($this->photo)) {
                Storage::delete($this->photo);
            }
            $path = $request->file('photo')->store('admin/cars');
            $this->photo = $path;
            $this->save();

        }
        return $this;
    }

    public function deleteFile($request)
    {
        if (isset($request->photo)) {
            unlink('storage/'.$request->photo);
            return true;
        }
        return false;
    }

}

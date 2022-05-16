<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Image;

class Master extends Component
{   
    use WithFileUploads;

    public function upload($file, $old_file, $disk)
    {

        if($file && $old_file){
            Storage::disk($disk)->delete($old_file);
        }
        
        $file_name = Str::random(30) . '.' . $file->getClientOriginalExtension();

        $file->storeAs('/', $file_name, $disk);

        return $file_name;
    }

    public function uploadImageBanner($file, $old_file, $disk)
    {

        if($file && $old_file){
            Storage::disk($disk)->delete($old_file);
        }

        $path = public_path().'/uploads/'.$disk.'/';
        $image_name = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $image = Image::make($file);
        $image->fit('1280','640')->encode('jpg', 80   );
        $image->save($path.$image_name);

        return $image_name;
    }

    public function uploadImageSquare($file, $old_file, $disk)
    {

        if($file && $old_file){
            Storage::disk($disk)->delete($old_file);
        }

        $path = public_path().'/uploads/'.$disk.'/';
        $image_name = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $image = Image::make($file);
        $image->fit('640','640')->encode('jpg', 80);
        $image->save($path.$image_name);

        return $image_name;
    }
}

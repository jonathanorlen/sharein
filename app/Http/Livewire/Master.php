<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Master extends Component
{   
    use WithFileUploads;

    public function upload($file, $old_file, $disk)
    {   $disk;

        if($file && $old_file){
            Storage::disk($disk)->delete($old_file);
        }

        $file_name = Str::random(30) . '.' . $file->getClientOriginalExtension();

        $file->storeAs('/', $file_name, $disk);

        return $file_name;
    }
}

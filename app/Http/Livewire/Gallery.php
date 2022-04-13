<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gallery as GalleryModel;

class Gallery extends Component
{   
    public $data;
    protected $listeners = ['refreshData' => '$refresh'];

    public function render()
    {   
        $this->data = GalleryModel::where('userId', auth()->id())->get();
        return view('livewire.gallery');
    }
    
    public function delete($id){
        GalleryModel::find($id)->delete();
    }
}

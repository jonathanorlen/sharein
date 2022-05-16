<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gallery as GalleryModel;

class Gallery extends Component
{   
    public $data, $id_delete;
    protected $listeners = ['refreshData' => '$refresh', 'delete'];

    public function render()
    {   
        $this->data = GalleryModel::where('userId', auth()->id())->get();
        return view('livewire.gallery');
    }
    
    public function setDelete($id){
        $this->id_delete = $id;
    }

    public function delete(){
        GalleryModel::find($this->id_delete)->delete();
    }
}

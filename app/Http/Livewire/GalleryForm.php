<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Master;
use App\Models\Gallery;

class GalleryForm extends Master
{   
    public $image, $old_image;

    public function render()
    {
        return view('livewire.gallery-form');
    }

    public function rules(){
        $rules = ['image' => 'required|mimes:jpg,jpeg,png|max:2048'];

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function create(){
        $data = $this->validate();
        
        $data['userId'] = auth()->id();
        $data['status'] = 'active';
        $data['image'] = $this->upload($this->image, $this->old_image, 'gallery');

        Gallery::create($data);
        $this->dispatchBrowserEvent("hide-modal");
        $this->emit('refreshData');
        $this->clear();
    }

    public function clear(){
        $this->image = "";
        $this->old_image = "";
    }

}

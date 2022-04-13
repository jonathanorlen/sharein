<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Master;
use App\Models\Banner;

class BannerForm extends Master
{   
    public $link, $image, $old_image;
    public function render()
    {
        return view('livewire.banner-form');
    }

    public function rules(){
        $rules = [
            'link' => 'nullable|max:250',
            'image' => 'required|mimes:jpg,jpeg|max:2048'
        ];

        return $rules;
    }

    public function create(){
        $data = $this->validate();
        
        $data['userId'] = auth()->id();
        $data['status'] = 'active';
        $data['image'] = $this->upload($this->image, $this->old_image, 'banner');

        Banner::create($data);
        $this->dispatchBrowserEvent("hide-modal");
        $this->emit('refreshData');
        $this->clear();
    }

    public function clear(){
        $this->link = "";
        $this->image = "";
        $this->old_image = "";
    }
}

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
        $search = Banner::where('userId', auth()->id())->get();
        if($search->count() > 8){
            $this->dispatchBrowserEvent("toast",
                [
                    'header' => 'Perhatian!',
                    'message' => 'Banner telah melebihi kuota 8',
                    'status' => 'danger',
                ]
            );
        }else{
            $data = $this->validate();
            
            $data['userId'] = auth()->id();
            $data['order'] = 1;
            $data['status'] = 'active';
            $data['image'] = $this->uploadImageBanner($this->image, $this->old_image, 'banner');
            foreach ($search as $item) {
                Banner::find($item['id'])->update(['order' => $item['order']+1]);
            }

            Banner::create($data);
            $this->dispatchBrowserEvent("hide-modal");
            $this->emit('refreshData');
            $this->clear();
        }
    }

    public function clear(){
        $this->link = "";
        $this->image = "";
        $this->old_image = "";
    }
}

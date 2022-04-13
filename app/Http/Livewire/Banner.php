<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Banner as BannerModel;

class Banner extends Component
{   
    public $data;
    protected $listeners = ['refreshData' => '$refresh'];

    public function render()
    {   
        $this->data = BannerModel::where('userId', auth()->id())->get();
        return view('livewire.banner');
    }

    public function update($value, $id, $type){
        if($type == "status"){
            if($value == true){
                $value = "active";
            }else{
                $value = "inactive";
            }
        }

        $result = BannerModel::find($id);
        $result->update([$type => $value]);


        $this->dispatchBrowserEvent("refreshIframe");
        // if($result->name != "" && $result->url != "" && $result->status == "active" ){
        // }
    }

    public function delete($id){
        BannerModel::find($id)->delete();
    }
}

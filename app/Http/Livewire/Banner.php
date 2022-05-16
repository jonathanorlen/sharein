<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Banner as BannerModel;
use Illuminate\Support\Facades\Validator;

class Banner extends Component
{   
    public $data, $id_delete, $order_delete, $user_id_delete;
    protected $listeners = ['refreshData' => '$refresh',
                            'delete'];

    public function render()
    {   
        $this->data = BannerModel::where('userId', auth()->id())->orderBy('order','asc')->get();
        return view('livewire.banner');
    }

    public function updateLinkOrder($items){
        foreach ($items as $item) {
            BannerModel::find($item['value'])->update(['order' => $item['order']]);
        }
        
        $this->dispatchBrowserEvent("refreshIframe");
    }

    public function update($value, $id, $type){
        if($type == "status"){
            if($value == true){
                $value = "active";
            }else{
                $value = "inactive";
            }
        }

        if($type == "link"){
            $name = 'link_'.$id;
            $data[$name] = $value;
            Validator::make( $data,[ $name => 'nullable|url'],[$name.'.url' => 'Format link tidak sesuai'])->validate();
        }

        $result = BannerModel::find($id);
        $result->update([$type => $value]);


        $this->dispatchBrowserEvent("refreshIframe");
        // if($result->name != "" && $result->url != "" && $result->status == "active" ){
        // }
    }

    public function setDelete($id, $userId, $order){
        $this->id_delete = $id;
        $this->order_delete = $order;
        $this->user_id_delete = $userId;
    }

    public function delete(){
        BannerModel::find($this->id_delete)->delete();
        BannerModel::where([['userId','=',$this->user_id_delete], ['order','>',$this->order_delete]])->decrement('order',1);
    }
}

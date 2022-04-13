<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as Data;

class Category extends Component
{   
    public $data;

    public function render()
    {   
        $this->data = Data::orderBy('order','asc')->where('userId',auth()->id())->get();
        return view('livewire.category');
    }

    public function updateOrder($items){
        foreach ($items as $item) {
            Data::find($item['value'])->update(['order' => $item['order']]);
        }
        
        $this->dispatchBrowserEvent("refreshIframe");
    }

    public function create(){
        foreach ($this->data as $item) {
            Data::find($item['id'])->update(['order' => $item['order']+1]);
        }

        Data::create([
            'userId' => auth()->id()
        ]);
    }

    public function update($value, $id, $type){
        if($type == "status"){
            if($value == true){
                $value = "active";
            }else{
                $value = "inactive";
            }
        }

        $result = Data::find($id);
        $result->update([$type => $value]);


        $this->dispatchBrowserEvent("refreshIframe");
        // if($result->name != "" && $result->url != "" && $result->status == "active" ){
        // }
    }

    public function delete($id, $userId, $order){
        Data::find($id)->delete();
        Data::where([['userId','=',$userId], ['order','>',$order]])->decrement('order',1);
    }
}

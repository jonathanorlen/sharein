<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link as Links;
use DB;

class Link extends Component
{   
    public $data;
    public function render()
    {   
        $this->data = Links::orderBy('order','asc')->where('userId',auth()->id())->get();
        return view('livewire.link');
    }

    public function updateLinkOrder($items){
        foreach ($items as $item) {
            Links::find($item['value'])->update(['order' => $item['order']]);
        }
        
        $this->dispatchBrowserEvent("refreshIframe");
    }

    public function create(){
        foreach ($this->data as $item) {
            Links::find($item['id'])->update(['order' => $item['order']+1]);
        }

        Links::create([
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

        $result = Links::find($id);
        $result->update([$type => $value]);


        $this->dispatchBrowserEvent("refreshIframe");
        // if($result->name != "" && $result->url != "" && $result->status == "active" ){
        // }
    }

    public function delete($id, $userId, $order){
        Links::find($id)->delete();
        Links::where([['userId','=',$userId], ['order','>',$order]])->decrement('order',1);
    }
}

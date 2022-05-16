<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link as Links;
use DB;
// use Validator;
use Illuminate\Support\Facades\Validator;

class Link extends Component
{   
    public $data, $id_delete, $order_delete, $user_id_delete;
    protected $listeners = ['delete'];

    protected function rules(){
        $rules = ['url' => 'nullable|url'];
        return $rules;
    }
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
        if($this->data->count() > 10){
            $this->dispatchBrowserEvent("toast",
                [
                    'header' => 'Perhatian!',
                    'message' => 'Link tidak boleh melebihi dari 10',
                    'status' => 'danger',
                ]
            );
        }else{
            foreach ($this->data as $item) {
                Links::find($item['id'])->update(['order' => $item['order']+1]);
            }
    
            Links::create([
                'userId' => auth()->id()
            ]);
        }
    }

    public function update($value, $id, $type){
        if($type == "url"){
            $name = 'url_'.$id;
            $data[$name] = $value;
            Validator::make( $data,[ $name => 'nullable|url'],[$name.'.url' => 'Format link tidak sesuai'])->validate();
        }
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

    public function setDelete($id, $userId, $order){
        $this->id_delete = $id;
        $this->order_delete = $order;
        $this->user_id_delete = $userId;
    }

    public function delete(){
        Links::find($this->id_delete)->delete();
        Links::where([['userId','=',$this->user_id_delete], ['order','>',$this->order_delete]])->decrement('order',1);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as Data;
use App\Models\Product;

class Category extends Component
{   
    public $data, $id_delete, $order_delete, $user_id_delete;
    protected $listeners = ['refreshData' => '$refresh',
                            'delete'];

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
        if($this->data->count() > 20){
            $this->dispatchBrowserEvent("toast",
                [
                    'header' => 'Perhatian!',
                    'message' => 'kategori tidak boleh melebihi dari 20',
                    'status' => 'danger',
                ]
            );
        }else{
            foreach ($this->data as $item) {
                Data::find($item['id'])->update(['order' => $item['order']+1]);
            }

            Data::create([
                'userId' => auth()->id()
            ]);
        }
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

    public function setDelete($id, $userId, $order){
        $this->id_delete = $id;
        $this->order_delete = $order;
        $this->user_id_delete = $userId;
    }

    public function delete(){
        Product::where([['userId',auth()->id()],['categoryId',$this->id_delete]])->update(['categoryId' => NULL]);
        Data::find($this->id_delete)->delete();
        Data::where([['userId','=',$this->user_id_delete], ['order','>',$this->order_delete]])->decrement('order',1);
    }
}

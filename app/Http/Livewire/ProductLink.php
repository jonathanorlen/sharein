<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;
use App\Models\Product;

class ProductLink extends Component
{   
    public $title, $price, $image, $data, $productId, $id_delete;

    protected $listeners = ['refreshData' => '$refresh',
                            'delete'];

    public function render()
    {   
        $this->data = Link::orderBy('order','asc')->where([['userId',auth()->id()],['productId',$this->productId]])->get();
        
        return view('livewire.product-link')->layout('layouts.app2');
    }

    public function mount(){
        $this->productId = request()->segment(5);

        $product = Product::find($this->productId);
        $this->title = $product->title;
        $this->image = $product->image;
        $this->price = $product->price;
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
                Link::where('productId',$this->productId)->find($item['id'])->update(['order' => $item['order']+1]);
            }
    
            Link::create([
                'userId' => auth()->id(),
                'productId' => $this->productId,
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

        $result = Link::find($id);
        $result->update([$type => $value]);
    }

    public function updateLinkOrder($items){
        foreach ($items as $item) {
            Link::where('productId',$this->productId)->find($item['value'])->update(['order' => $item['order']]);
        }
    }

    public function setDelete($id){
        $this->id_delete = $id;
    }
    
    public function delete(){
        Link::find($this->id_delete)->delete();
    }
}

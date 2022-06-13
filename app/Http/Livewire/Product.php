<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Data;
use App\Models\Category;
use App\Models\Link;

class Product extends Component
{   
    public $data, $id_delete, $search, $categories, $category = NULL;

    protected $listeners = ['refreshData' => '$refresh',
                            'delete'];
                            
    public function render()
    {   
        $data = Data::orderBy('updated_at','asc')->where([['userId',auth()->id()],['title','like','%'.$this->search.'%']]);
        if($this->category){
            $data->where('categoryId','LIKE','%'.$this->category.'%');
        }
        $this->data = $data->get();
        $this->categories = Category::orderBy('order','asc')->where('userId',auth()->id())->get();
        return view('livewire.product');
    }

    public function setDelete($id){
        $this->id_delete = $id;
    }

    public function delete(){
        Link::where([['userId',auth()->id()],['productId',$this->id_delete]])->delete();
        Data::find($this->id_delete)->delete();
        $this->dispatchBrowserEvent("refreshIframe");
    }
}

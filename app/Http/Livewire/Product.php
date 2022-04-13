<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Data;

class Product extends Component
{   
    public $data;

    public function render()
    {   
        $this->data = Data::orderBy('updated_at','asc')->where('userId',auth()->id())->get();
        return view('livewire.product');
    }

    public function delete($id){
        Data::find($id)->delete();
    }
}

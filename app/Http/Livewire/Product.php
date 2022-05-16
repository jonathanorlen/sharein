<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Data;

class Product extends Component
{   
    public $data, $id_delete;

    protected $listeners = ['refreshData' => '$refresh',
                            'delete'];
                            
    public function render()
    {   
        $this->data = Data::orderBy('updated_at','asc')->where('userId',auth()->id())->get();
        return view('livewire.product');
    }

    public function setDelete($id){
        $this->id_delete = $id;
    }

    public function delete(){
        Data::find($this->id_delete)->delete();
    }
}

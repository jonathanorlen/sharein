<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class ModalDelete extends Component
{
    public function render()
    {
        return view('livewire.component.modal-delete');
    }

    public function delete(){
        $this->emit('delete');
    }
}

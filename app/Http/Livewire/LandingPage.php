<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link as Links;
use App\Models\User;
use DB;

class LandingPage extends Component
{   
    public $links;

    public function mount($domain){
        $user = User::where('domain', $domain)->first();
        // dd($domain);
        $this->links = Links::where([
            ['userId','=',$user->id],['status','=','active'],['name','!=',NULL],['url','!=',NULL], ['productId','=',NULL]])
        ->orderBy('order','asc')
        ->get();
    }

    public function render()
    {   
        // $this->data = User::where('domain')->first();
        return view('livewire.landing-page')->layout('layouts.base');
    }

}

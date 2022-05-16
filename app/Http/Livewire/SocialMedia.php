<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SocialMedia as Data;

class SocialMedia extends Component
{   
    public $data = null, $facebook, $instagram, $whatsapp, $line, $email, $youtube, $tiktok, $telegram, $twitter;

    public function render()
    {   
        return view('livewire.social-media');
    }

    protected function rules(){
        $rules = [
            'instagram' => 'regex:/^\S*$/u',
        ];

        return $rules;
    }

    protected $messages = [
        'instagram.regex' => 'Akun Instagram tidak boleh menggunakan spasi'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $data = Data::where('userId',auth()->user()->id)->first();
        if($data != null){
            $this->data = $data;
            $this->facebook = $data->facebook;
            $this->instagram = $data->instagram;
            $this->whatsapp = $data->whatsapp;
            $this->line = $data->line;
            $this->email = $data->email;
            $this->youtube = $data->youtube;
            $this->tiktok = $data->tiktok;
            $this->telegram = $data->telegram;
        }
    }

    public function updateSocialMedia($value, $type){
        if($this->data == null){
            $this->data = Data::create([
                $type => $value,
                'userId' => auth()->id()
            ]);
        }else{
            $this->data->update([$type => $value]);
            $this->dispatchBrowserEvent("refreshIframe");
        }

        // if($result->name != "" && $result->url != "" && $result->status == "active" ){
        // }
    }

}

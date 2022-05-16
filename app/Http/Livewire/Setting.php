<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Livewire\Master;
use Image;
use Illuminate\Support\Facades\Storage;
use Str;

class Setting extends Master
{   
    public $title, $bio, $about, $profile_picture, $old_profile_picture, $profile_title;
    public function render()
    {
        return view('livewire.setting');
    }

    public function mount(){
        $user = User::find(auth()->id());
        $this->profile_title = $user->profile_title;
        $this->bio = $user->bio;
        $this->about = $user->about;
        $this->old_profile_picture = $user->profile_picture;
    }

    public function update($value, $type){

        $result = User::find(auth()->id());
        $result->update([$type => $value]);


        $this->dispatchBrowserEvent("refreshIframe");
    }
    // profile_picture
    public function updatedProfilePicture(){
        
        if($this->profile_picture && $this->old_profile_picture){
            Storage::disk('profile')->delete($this->profile_picture);
        }

        $path = public_path().'/uploads/profile/';
        $image_name = Str::random(30) . '.' . $this->profile_picture->getClientOriginalExtension();
        $image = Image::make($this->profile_picture);
        $image->fit('640','640')->encode('jpg', 80);
        $image->save($path.$image_name);

        $result = User::find(auth()->id());
        $result->update(['profile_picture' => $image_name]);

        $this->profile_picture = "";
        $this->old_profile_picture = $image_name;

        $this->dispatchBrowserEvent("refreshIframe");
    }
}

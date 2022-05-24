<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Link;
use App\Models\Visitor;
use DB;
use Jenssegers\Agent\Agent;
use GeoiIp;
use Illuminate\Support\Facades\Cache;
use Session;
use Carbon\Carbon;

class LandingPageProduct extends Component
{   
    public $product, $userId, $userDomain, $links, $user;
    public function mount($domain,Product $product){
        $this->product = $product;
        $this->user = User::where('domain', $domain)->first();
        $this->userId = $this->user->id;
        $this->userDomain = $this->user->domain;

        $this->links = Link::where([
            ['userId','=',$this->user->id],['status','=','active'],['name','!=',''],['url','!=',''],['productId',$product->id]])
        ->orderBy('order','asc')
        ->get();

    }

    public function render()
    {   
        if(session()->has('visit_landing_'.$this->product->id)){
            if(session()->get('visit_landing_'.$this->product->id)->addMinutes(5)->isPast()){
                $session = session()->put('visit_landing_'.$this->product->id, Carbon::now());
                $this->addVisitor($this->product->id,"product");
            }
        }else if(!session()->has('visit_landing_'.$this->product->id)){
            session()->put('visit_landing_'.$this->product->id, Carbon::now());
            $this->addVisitor($this->product->id,"product");
        }
        return view('livewire.landing-page-product')->layout('layouts.base');
    }

    public function addVisitor($itemId, $type){
        // dd("oke");
        $geouipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        $agent = new Agent();

        if($agent->isMobile()){
            $device = "Mobile";
        }else if($agent->isTablet()){
            $device = "Tablet";
        }else if($agent->isPhone()){
            $device = "Phone";
        }else if($agent->isDesktop()){
            $device = "Desktop";
        }else{
            $device = "Other";
        }
        
        Visitor::create([
            'itemId' => $itemId,
            'country'  => $geouipInfo->country,
            'type' => $type,
            'device' => $device,
            'platform' => $agent->platform(),
            'browser' => $agent->browser(),
        ]);
    }
}

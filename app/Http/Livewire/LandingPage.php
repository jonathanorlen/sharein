<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link as Links;
use App\Models\User;
use App\Models\Category;
use App\Models\SocialMedia;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Visitor;
use App\Models\Gallery;
use DB;
use Jenssegers\Agent\Agent;
use GeoiIp;
use Illuminate\Support\Facades\Cache;
use Session;
use Carbon\Carbon;

class LandingPage extends Component
{   
    public $userId, $userDomain, $links, $galleries, $categories, $data, $products, $select_category,$cate, $search, $social_media, $total_product, $banners, $user;
    public $linkLimit;
    
    public function mount($domain){
        $user = User::where('domain', $domain)->firstOrFail();
        $this->userId = $user->id;
        $this->userDomain = $user->domain;

        $this->links = Links::where([
            ['userId','=',$user->id],['status','=','active'],['name','!=',''],['url','!=',''],['productId',NULL]])
        ->orderBy('order','asc')
        ->get();
        // dd($this->links);

        $this->categories = Category::where([
            ['userId','=',$user->id],['title','!=','']])
        ->orderBy('order','asc')
        ->get();

        $this->banners = Banner::where([
            ['userId','=',$user->id],['status','active']])
        ->orderBy('order','asc')
        ->get();

        $this->social_media = SocialMedia::where([
            ['userId','=',$user->id]])
        ->first();


        $this->galleries = Gallery::where([
            ['userId','=',$user->id]])
        ->get();
        
        $this->user = User::where('id', $user->id)->first();
        
        $count = Product::where('userId','=',$this->userId)->count();
        $this->total_product = (($count > 0 )? $count : 0);
    }

    public function render()
    {   
        $this->products = Product::where('userId','=',$this->userId)
                ->where('categoryId','like','%'.$this->select_category.'%')
                ->where('title','like','%'.$this->search.'%')
                ->get();
        
        if(session()->has('visit_landing')){
            if(session()->get('visit_landing')->addMinutes(5)->isPast()){
                $session = session()->put('visit_landing', Carbon::now());
                $this->addVisitor($this->userId,"landing page");
            }
        }else if(!session()->has('visit_landing')){
            $session = session()->put('visit_landing', Carbon::now());
            $this->addVisitor($this->userId,"landing page");
        }

        return view('livewire.landing-page')->layout('layouts.base');
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

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visitor;
use App\Models\Link;
use App\Models\SocialMedia;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class Analytics extends Component
{   
    public $visitor = [],$visitor_date = [], $visitor_number = [], $visitor_total, 
        $link = [], $link_date = [], $link_number = [], $link_total, 
        $products = [], $social, $social_count, $social_total;

    public function mount(){
        $this->getLink();
        $this->getVisitors();
        $this->getSocialMedia();
        $this->getProduct();
    }
    public function render()
    {   
        return view('livewire.analytics')->layout('layouts.app2');
    }

    public function getVisitors(){
        $visitor = Visitor::where([['type','landing page'],['itemId',auth()->id()]]);

        $this->visitor_total = $visitor->get()->count();
        $this->visitor = $visitor
        ->where('created_at', '>', Carbon::today()->subDays(7))
        ->select(DB::raw('DATE(created_at) as day'),DB::raw('count(*) as total'))
        ->groupBy('day')
        ->get();

        $this->visitor_date = $this->visitor->map(function($item){
            return  Carbon::parse($item->day)->format('M d');
        });

        $this->visitor_number = $this->visitor->map(function($item){
            return  $item->total;
        });
    }

    public function getLink(){
        $getLink = Link::select('id')->where('userId',auth()->id())->pluck('id')->toArray();
        $link = Visitor::where([['type','link']])->whereIn('itemId',$getLink);

        $this->link_total = $link->get()->count();
        $this->link = $link
        ->where('created_at', '>', Carbon::today()->subDays(7))
        ->select(DB::raw('DATE(created_at) as day'),DB::raw('count(*) as total'))
        ->groupBy('day')
        ->get();

        $this->link_date = $this->link->map(function($item){
            return  Carbon::parse($item->day)->format('M d');
        });

        $this->link_number = $this->link->map(function($item){
            return  $item->total;
        });
    }

    public function getSocialMedia(){
        $social_base = Visitor::where([['itemId',auth()->id()],['type','like','%social%']]);
        $this->social_total = $social_base->get()->count();
        $social = $social_base 
        ->where('created_at', '>', Carbon::today()->subDays(7))
        ->select(DB::raw('REPLACE(type,"social:","") as type'),DB::raw('count(*) as total'))
        ->groupBy('type')
        ->get();

        $this->social = $social->map(function($item){
            return  $item->type;
        });

        $this->social_count = $social->map(function($item){
            return  $item->total;
        });
    }

    public function getProduct(){
        $this->products = Product::where([['userId',auth()->id()]])
            ->orderBy('get_view_count','desc')
            ->withCount('getView')
            ->limit(3)
            ->get();
    }
}

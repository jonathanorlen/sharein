<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Master;
use App\Models\Category;
use App\Models\Product;

class ProductForm extends Master
{   

    public $productId, $categories, $image, $title, $price, $category, $description, $old_image, $type = "create", $seo_title, $seo_description, $facebook_pixel_id;

    public function render()
    {   
        $this->categories = Category::orderBy('order','asc')->where('userId',auth()->id())->get();
        return view('livewire.product-form')->layout('layouts.app2');
    }

    public function mount(Product $product){
        if($product->id != null){
            $this->productId = $product->id;
            $this->category = $product->categoryId; 
            $this->old_image = $product->image; 
            $this->title = $product->title; 
            $this->price = $product->price;  
            $this->description = $product->description;
            $this->type = "edit";
        }
    }

    public function rules(){
        $rules = [
            'category' => 'nullable',
            'price' => 'required',
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'seo_title' => 'nullable',
            'seo_description' => 'nullable',
            'facebook_pixel_id' => 'nullable|numeric',
        ];

        if($this->old_image){
            $rules['image'] = 'nullable|mimes:jpg,jpeg,png|max:2048';
        }else{
            $rules['image'] = 'required|mimes:jpg,jpeg,png|max:2048';
        }

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create(){
        $data = $this->validate();
        $data['image'] = $this->uploadImageSquare($this->image, $this->old_image,'product');
        $data['categoryId'] = $data['category'];
        $data['userId'] = auth()->id();
        unset($data['category']);

        Product::create($data);

        return redirect()->route('product');
    }

    public function update(){
        $data = $this->validate();
        $product = Product::find($this->productId);
        if($this->image){
            $data['image'] = $this->uploadImageSquare($this->image, $this->old_image,'product');
        }else{
            $data['image'] = $product->image;
        }
        $data['categoryId'] = $data['category'];
        unset($data['category']);

        $product->update($data);

        return redirect()->route('product');
    }

    // private function upload()
    // {
    //     if($this->old_image && $this->image){
    //         Storage::disk('product')->delete($this->old_image);
    //     }

    //     if($this->image){
    //         $image_name = Str::random(30) . '.' . $this->image->getClientOriginalExtension();
    //         // $this->image->move($path, $image_name);
    //         $this->image->storeAs('/', $image_name, "product");
    //         return $image_name;
    //     }

    // }
}

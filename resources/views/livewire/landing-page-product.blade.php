<div class="col-12 col-sm-6 col-md-5 mb-5">
    <style>
    .container > .btn {
        position: absolute;
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 12px;
        border: none;
        cursor: pointer;
        border-radius: 50%;
    }
    </style>
    <div class="container p-0 position-relative">
        <img src="{{ url('uploads/product/' . $product->image) }}" class="w-100" alt="">
        <a href="{{ URL::to('/'.$userDomain); }}" class="btn btn-transparent" style="top: 2%;left: 2%;"><i class='bx bx-arrow-back'></i></a>
    </div>
    <div class="mt-4 px-3 px-md-0 h2 text-neutral-100">{{ $product->title }}</div>
    <div class="mt-1 px-3 px-md-0 h4 text-primary">{{ format_rupiah($product->price) }}</div>
    <div class="mt-4 px-3 px-md-0 text-l text-neutral-80">{{ $product->description }}</div>
    <div class="d-grid gap-3 mt-4 px-3 px-md-0 ">
        @foreach ($links as $item)
            <a href="{{ $item->url }}" target="_blank" class="btn btn-links btn-primary d-flex align-items-center justify-content-center"
                type="button" style="height: 50px"  wire:click="addVisitor({{ $item->id }},'link')">{{ $item->name }}</a>
        @endforeach
    </div>
    <button class="btn btn-transparent position-absolute top-0 end-0 mt-2 me-2 mt-md-4 me-md-4 p-2" id="share-button" onclick="toastSuccess()"><i class="bx bx-share-alt fs-4" style=""></i></button>
</div>
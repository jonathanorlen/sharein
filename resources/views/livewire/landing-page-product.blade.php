<div class="col-12 col-sm-6 col-md-5 pb-5 bg-white">
    <div class="container p-0 position-relative">
        <img src="{{ url('uploads/product/' . $product->image) }}" class="w-100" alt="">
        <a href="{{ URL::to('/' . $userDomain) }}" class="btn btn-transparent" style="top: 2%;left: 2%;"><i
                class='bx bx-arrow-back'></i></a>
    </div>
    <div class="mt-4 px-3 px-md-3 h2 text-neutral-100">{{ $product->title }}</div>
    <div class="mt-1 px-3 px-md-3 h4 text-color">{{ format_rupiah($product->price) }}</div>
    <div class="d-grid gap-3 mt-4 px-3 px-md-3 ">
        @foreach ($links as $item)
            <a href="{{ $item->url }}" target="_blank"
                class="btn btn-links btn-color d-flex align-items-center justify-content-center" type="button"
                style="height: 50px" wire:click="addVisitor({{ $item->id }},'link')">{{ $item->title }}</a>
        @endforeach
    </div>
    <div class="mt-4 px-3 px-md-3 text-l text-neutral-80" style="word-break: break-all; ">
        {{-- {{ $product->description }} --}}
        {!! $product->description !!}
    </div>
    <button class="btn btn-transparent position-absolute top-0 end-0 mt-2 me-2 mt-md-4 me-md-4 p-2" id="share-button"
        onclick="toastSuccess()"><i class="bx bx-share-alt fs-4" style=""></i></button>
</div>
@push('style')
    <style>
        .container>.btn {
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
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            var showChar = 204;
            var ellipsestext = "...";
            var moretext = "more";
            var lesstext = "less";
            $('.more').each(function() {
                var content = $(this).html();
                console.log(content.length);
                if (content.length > showChar) {

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar - 1, content.length - showChar);

                    var html = c + '<span class="moreellipses">' + ellipsestext +
                        '&nbsp;</span><span class="morecontent"><span>' + h +
                        '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").click(function() {
                if ($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });
    </script>
@endpush

<div class="col-md-6 mt-4 offset-md-3 pb-5">
    <div class="card p-4 mb-5">
        {{-- <span class="f5">Analisa</span> --}}
        <div class="row">
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <div class="d-flex flex-column justify-content-center">
                    <span class="text-neutral-70">Landing Page</span>
                    <span an class="h2">{{ $visitor_total }}</span>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <div class="d-flex flex-column justify-content-center">
                    <span class="text-neutral-70">Link Klik</span>
                    <span class="h2">{{ $link_total }}</span>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3 mb-md-0">
                <div class="d-flex flex-column justify-content-center">
                    <span class="text-neutral-70">Social Media</span>
                    <span class="h2">{{ $social_total }}</span>
                </div>
            </div>
        </div>
        {{-- <div class="">
           <div class="d-flex flex-column justify-content-center">
                <span>Landing Page</span>
                <span an class="h2">{{ $visitor_total }}</span>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <span>Link Klik</span>
                <span class="h2">{{ $link_total }}</span>
            </div>
        </div> --}}
        {{-- <div class="" id="chart"></div> --}}
    </div>

    <div class="h2 mb-2">Visitor Landing Page</div>
    <div class="card p-4 mb-5">
        <div class="" id="chart"></div>
    </div>

    <div class="h2 mb-2">Klik Link</div>
    <div class="card p-4 mb-5">
        <div class="" id="chart_click"></div>
    </div>

    <div class="h2 mb-2">Social Media</div>
    <div class="card p-4 mb-5">
        <div class="" id="chart_social"></div>
    </div>

    <div class="h2 mb-2">Produk</div>
    <div class="row">
        @foreach ($products as $item)
            <div class="col-6 col-sm-6 col-md-4 ">
                <div class="card rounded-3 border-neutral-20 border">
                    {{-- <div class="image-ratio rounded-top rounded-3"
                    style="background-image:url({{ url('uploads/product/' . $item->image) }})">
                </div> --}}
                    <img src="{{ url('uploads/product/' . $item->image) }}" alt="">
                    <div class="card-body">
                        <div class="d-flex flex-column bd-highlight">
                            <div class="">
                                <span class="h3 truncate-overflow ">{{ $item->title }}</span>
                            </div>
                            <div class="">
                                <span class="text-m text-primary">{{ format_rupiah($item->price) }}</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-neutral-80">
                                    {{ $item->get_view_count }} Dilihat
                                </span>
                                {{-- <img src="{{ asset('icons/trash-2.svg') }}"
                                wire:click="setDelete({{ $item->id }})"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                alt="menu" class="float-end">
                            <a href="{{ route('product.edit', $item->id) }}">
                                <img src="{{ asset('icons/edit-3.svg') }}" alt="menu" class="float-end me-2">
                            </a>
                            <a href="{{ route('product.link', $item->id) }}">
                                <img src="{{ asset('icons/link.svg') }}" alt="menu" class="float-end me-2">
                            </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" defer data-turbolinks-track="reload"></script>
    <script>
        console.clear();
        if (@json($visitor_number).length > 0) {
            var options = {
                chart: {
                    type: 'line'
                },
                stroke: {
                    curve: 'smooth',
                },
                series: [{
                    name: 'Pengunjung',
                    data: @json($visitor_number)
                }],
                xaxis: {
                    categories: @json($visitor_date)
                }
            }
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }
        if (@json($link_number).length > 0) {
            //chart click with bar
            var options_click = {
                chart: {
                    type: 'bar'
                },
                stroke: {
                    curve: 'smooth',
                },
                series: [{
                    name: 'Pengunjung',
                    data: @json($link_number)
                }],
                xaxis: {
                    categories: @json($link_date)
                }
            }
            var chart_click = new ApexCharts(document.querySelector("#chart_click"), options_click);
            chart_click.render();
        }

        if (@json($social_count).length > 0) {
            //chart for social media
            var options_social = {
                series: @json($social_count),
                chart: {
                    type: 'donut',
                },
                labels: @json($social),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chart_social = new ApexCharts(document.querySelector("#chart_social"), options_social);
            chart_social.render();
        }
    </script>
@endpush

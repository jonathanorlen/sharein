<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('image/logo_title.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: 'Inter';
            background: #fff;
        }
    </style>
</head>

<body>
    <nav class="container p-4  bg-white">
        <img src="{{ asset('image/logo.svg') }}" alt="" class="me-auto my-auto d-block d-md-none"
            style="height: 24px">
        <div class="d-flex justify-content-end">
            <img src="{{ asset('image/logo.svg') }}" alt="" class="me-auto my-auto d-none d-md-block"
                style="height: 24px">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('panel/website/link') }}"
                            class="text-primary btn text-l px-l py-m rounded-m">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-primary btn text-l px-l py-m rounded-m">Masuk</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ms-xl btn btn-primary text-l px-l py-m rounded-m">Registrasi</a>
                        @endif
                @endif
            </div>
            @endif
            </div>
        </nav>
        <section class="container position-relative">
            <div class="row justify-content-center px-4">
                <div class="col-12">
                    <div class="col-12 mt-xxxl text-center">
                        <h1 class="h1  text-neutral-100 mb-m" style="font-weight: 600 !important">Kembangkan bisnismu dengan
                            Beenausaha</h1>
                        <p class="text-l text-neutral-80 mb-0">
                            <span>
                                Hubungkan social media bisnismu dengan marketplace ternama
                            </span>
                        </p>
                        <p class="text-l text-neutral-80 mb-xxl">
                            <span>
                                Bagikan produkmu dengan mudah
                            </span>
                        </p>
                        <a href="{{ route('register') }}" class="btn btn-secondary text-l px-xl py-m rounded-m">Buat
                            Website Sekarang</a>
                        <p class="text-l text-neutral-80 mb-xxl mt-m">
                            <span>
                                Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary"> Masuk</a>
                            </span>
                        </p>
                        <img src="{{ asset('image/frontend/icon/phone.png') }}" alt=""
                            class="mx-auto d-block welcome-phone">
                        <div class="mt-xxxxl">
                            <div class="h2 text-neutral-100" style="font-weight: 600;z-index:10">Buat Website Sekarang</div>
                            <div class="custom-search mt-xxl">
                                <div class="glowinput"></div>
                                <input type="text" class="custom-search-input glowinput position-relative"
                                    placeholder="Masukan domain (con : orstellycare)" onKeyDown="showButton(this)">
                                <button class="custom-search-botton" type="submit" id="submit">
                                    <i class='bx bx-chevron-right'></i>
                                </button>
                            </div>
                            {{-- <div class="custom-search">
                            <input type="text" class="custom-search-input" placeholder="Masukan domain (ex : orstellycare)" onchange="showButton(this)">
                            <button class="custom-search-botton" type="submit" id="submit">                            
                                <i class='bx bx-chevron-right'></i>
                            </button>  
                        </div> --}}
                        </div>
                    </div>
                    <img src="{{ asset('image/frontend/icon/whatsapp_icon.png') }}" class="d-none d-sm-block updown"
                        alt="" style="position: absolute;width: 44px;height: 44px;left: 5%;top: 4%;">
                    <img src="{{ asset('image/frontend/icon/twitter_icon.png') }}" class="d-none d-sm-block downup"
                        alt="" style="position: absolute;width: 60px;height: 60px;left: 25%;top: 8%;">
                    <img src="{{ asset('image/frontend/icon/tiktok_icon.png') }}" class="d-none d-sm-block updown"
                        alt="" style="position: absolute;width: 52px;height: 52px;left: 12%;top: 18%;">
                    <img src="{{ asset('image/frontend/icon/telegram_icon.png') }}" class="d-none d-sm-block downup"
                        alt="" style="position: absolute;width: 48px;height: 48px;left: 20%;top: 23%;">
                    <img src="{{ asset('image/frontend/icon/youtube_icon.png') }}" class="d-none d-sm-block updown"
                        alt="" style="position: absolute;width: 56px;height: 56px;left: 70%;top: 7%;">
                    <img src="{{ asset('image/frontend/icon/instagram_icon.png') }}" class="d-none d-sm-block downup"
                        alt="" style="position: absolute;width: 40px;height: 40px;left: 95%;top: 3%;">
                    <img src="{{ asset('image/frontend/icon/facebook_icon.png') }}" class="d-none d-sm-block updown"
                        alt="" style="position: absolute;width: 48px;height: 48px;left: 78%;top: 25%;">
                    <img src="{{ asset('image/frontend/icon/shop_icon.png') }}" class="d-none d-sm-block downup"
                        alt="" style="position: absolute;width: 44px;height: 44px;left: 85%;top: 17%;">
                    <img src="{{ asset('image/frontend/icon/chart_left.png') }}" class="d-none d-sm-block" alt=""
                        style="position: absolute;width: 207px;height: 262.5px;left: 10%;top: 891px;">
                    <img src="{{ asset('image/frontend/icon/chart_right.png') }}" class="d-none d-sm-block" alt=""
                        style="position: absolute;width: 207px;height: 262.5px;left: 73%;top: 776px;">
                </div>
                <div class="col-12 mt-xxxxl">
                    <div class="row">
                        <div class="col-md-4 d-flex flex-column align-items-center mb-4 mb-md-0">
                            <img src="{{ asset('image/frontend/icon/katalog_icon.png') }}" style="width: 64px"
                                alt="">
                            <h3 class="mt-l text-neutral-100 h3 mb-s" style="font-weight: 600">Produk Katalog</h3>
                            <span class="text-l text-neutral-70 text-center">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget convallis varius vitae libero
                                diam eu risus. Imperdiet
                            </span>
                        </div>
                        <div class="col-md-4 d-flex flex-column align-items-center mb-4 mb-md-0">
                            <img src="{{ asset('image/frontend/icon/bisnis_icon.png') }}" style="width: 64px"
                                alt="">
                            <h3 class="mt-l text-neutral-100 h3 mb-s" style="font-weight: 600">Bisnis Profile</h3>
                            <span class="text-l text-neutral-70 text-center">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget convallis varius vitae libero
                                diam eu risus. Imperdiet
                            </span>
                        </div>
                        <div class="col-md-4 d-flex flex-column align-items-center mb-4 mb-md-0">
                            <img src="{{ asset('image/frontend/icon/galeri_icon.png') }}" style="width: 64px"
                                alt="">
                            <h3 class="mt-l text-neutral-100 h3" style="font-weight: 600">Galeri</h3>
                            <span class="text-l text-neutral-70 text-center">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget convallis varius vitae libero
                                diam eu risus. Imperdiet
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <div class="container-fluid my-5 pt-5 px-5">
        <div class="row justify-content-center px-4">
        </div>
    </div> --}}
        <footer class="container d-flex justify-content-center mt-5">
            <span class="text-l text-neutral-80 mt-5 mb-5">
                Copyright © 2022 ShareIn. All rights reserved.
            </span>
        </footer>
        <script>
            document.getElementById("submit").style.display = 'none';

            function showButton(value) {
                console.log(value.value);
                let id = "submit";
                if (value.value) {
                    document.getElementById(id).style.display = 'block';
                } else {
                    document.getElementById(id).style.display = 'none';
                }
            }
        </script>
        <script src="{{ asset('js/unused.min.js') }}"></script>
    </body>

    </html>

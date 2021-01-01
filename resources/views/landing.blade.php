<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('template/vendor/nucleo/css/nucleo.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/argon.css?v=1.2.0') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <nav class="navbar navbar-horizontal navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-" href="#">
                <img src="{{ asset('img/pemira-logo.png') }}" alt="{{ config('app.name') . ' logo' }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="javascript:void(0)">
                                <img src="../../assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <ul class="navbar-nav ml-lg-auto">
                    @php
                        $menus = [
                            [
                                'text' => 'home',
                                'url' => '/'
                            ],
                            [
                                'text' => 'tentang',
                                'url' => '/#tentang'
                            ],
                            [
                                'text' => 'calon',
                                'url' => '/#calon'
                            ],
                            [
                                'text' => 'jadwal',
                                'url' => '/#jadwal'
                            ],
                            [
                                'text' => 'kontak',
                                'url' => '/#kontak'
                            ],
                        ];
                    @endphp
                    @foreach ($menus as $menu)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $menu['url'] }}">
                                <span class="text-white text-capitalize">
                                    {{ $menu['text'] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('login') }}" class="nav-link btn-secondary btn-sm rounded">
                            <span class="">Mulai sekarang</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header style="background-image: url({{ asset('img/header-bg.jpg') }})" class="overlay">
        <div class="container">
            <img src="{{ asset('img/header-mobile.png') }}" class="header-mobile">
            <div class="header__text">
                <h1>Selamat Datang di Pemira UPN Veteran Jakarta</h1>
                <p>
                    Pemilihan dengan bersih dan adil, karena kami yakin majunya UPN Veteran jakarta berawal dari kebersihan hati untuk senantiasa adil pada segenap civitas 
                    akademik UPN Veteran Jakarta
                </p>
                <a href="" class="btn btn-secondary btn-lg text-primary rounded-pill">Start pemira</a>
            </div>
        </div>
    </header>
    <main>
        <section id="{{ $menus[1]['text'] }}">
            <div class="container">
                <img src="{{ asset('img/pemira-sidebar-logo.png') }}" height="100">
                <p>TENTANG PEMIRA</p>
                <p class="text-primary h2 font-weight-normal">
                    Pemira UPN Veteran Jakarta merupakan kegiatan pemilihan Raya yang di ikuti oleh seluruh civitas akademika UPN Veteran jakarta, untuk mendapatkan pemimpin ideal yang di cintai seluruh Civitas Akademik UPN Veteran Jakarta
                </p>
            </div>
        </section>
        <section id="{{ $menus[2]['text'] }}">
            <div class="container">
                <h1 class="text-center mb-5 h1">Calon</h1>
                <div class="swiper-container swiper-calon">
                    <div class="swiper-wrapper">
                        @foreach ($calons as $calon)
                            <div class="swiper-slide">
                                <figure class="text-center">
                                    <img src="{{ Storage::url($calon->foto) }}" alt="">
                                    <figcaption class="py-3 h3">
                                        {{ $calon->user->nama }}
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                  </div>
            </div>
        </section>
        <section id="{{ $menus[3]['text'] }}" class="bg-primary">
            <div class="container">
                <h1 class="text-white text-center mb-5">Jadwal</h1>
                <ul class="list-group">
                    @foreach ($jadwals as $jadwal)
                        <li class="list-group-item mb-3 rounded
                        {{ $jadwal->tgl === date('Y-M-D') ? 'bg-primary' : '' }}">
                            <p class="font-weight-bold">{{ $jadwal->judul }}</p>
                            <p>{{ $jadwal->tgl }}</p>
                            <time>
                                {{ 
                                    $jadwal->jam_mulai->format('H:i') . ' - ' . 
                                    $jadwal->jam_selesai->format('H:i') . ' WIB' 
                                }}
                            </time>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section id="{{ $menus[4]['text'] }}">
            <div class="container">
                <h1 class="text-center mb-5">HUBUNGI KAMI</h1>
                <div class="row justify-content-center">
                    @php
                        $contacts = [
                            [
                                'title' => 'location',
                                'url' => 'maps.google.com',
                                'text' => 'Jl. RS. Fatmawati Raya, Pd. Labu, Kec. Cilandak, 
                                        Kota Depok, Jawa Barat 12450'
                            ],
                            [
                                'title' => 'whatsapp',
                                'url' => 'wa.me/6285695513587',
                                'text' => '6285695513587'
                            ],
                            [
                                'title' => 'email',
                                'url' => 'mailto:mpmupnveteranjakarta@gmail.com',
                                'text' => 'mpmupnveteranjakarta@gmail.com'
                            ],
                        ];
                    @endphp
                    @foreach ($contacts as $contact)
                        <div class="col-12 col-lg-3">
                            <div class="py-3 text-center">
                                <p class="text-capitalize font-weight-bold">
                                    {{ $contact['title'] }}
                                </p>
                                <a href="{{ $contact['url'] }}" class="text-default d-block">
                                    {{ $contact['text'] }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('template/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}">
    </script>
    <script src="{{ asset('template/js/argon.js?v=1.2.0') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        $(window).on('scroll', function(){
            if ($(window).scrollTop() > 0) {
                $("nav").addClass("sticky")
            }
            else {
                $("nav").removeClass("sticky")
            }
        })

        var swiper = new Swiper('.swiper-calon', {
        slidesPerView: 2,
        spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>
</html>
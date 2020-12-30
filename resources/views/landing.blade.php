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
</head>
<body>
    <header style="background-image: url({{ asset('img/header-bg.jpg') }})" class="overlay">
        <nav class="navbar navbar-horizontal navbar-expand-lg bg-transparent">
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
                                    'url' => '/#home'
                                ],
                                [
                                    'text' => 'tentang',
                                    'url' => '/#tentang'
                                ],
                                [
                                    'text' => 'fitur',
                                    'url' => '/#fitur'
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
                                    'text' => 'panduan',
                                    'url' => '/#panduan'
                                ],
                                [
                                    'text' => 'kontak',
                                    'url' => '/#kontak'
                                ],
                            ];
                        @endphp
                        @foreach ($menus as $menu)
                            <li class="nav-item">
                                <a class="nav-link nav-link-icon" href="{{ $menu['url'] }}">
                                    <span class="nav-link text-white text-capitalize">
                                        {{ $menu['text'] }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
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
        <section id="{{ Str::of($menus[0]['url'])->replace('/#', '') }}">

        </section>
    </main>

    <script src="{{ asset('template/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}">
    </script>
    <script src="{{ asset('template/js/argon.js?v=1.2.0') }}"></script>
</body>
</html>
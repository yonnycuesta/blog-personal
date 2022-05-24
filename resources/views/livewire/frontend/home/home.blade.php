<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Blog |Personal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- My Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @livewireStyles
</head>

<body>

    <div class="navbar nav">
        <div class="navbar-brand">
            <a class="navbar-item">SNOW</a>

        </div>
        <div id="navbarMenu" class="navbar-menu">

            <input type="checkbox" id="burger">
            <label for="burger"><i class="fas fa-bars"></i></label>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#blog">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#profile-contact">Sobre mi</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#services">Servicios</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#portfolio">Portafolio</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#contact">Contacto</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Panel Administrador') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                @endif
            </ul>
        </div>

    </div>

    <div class="header">
        <img src="/assets/img/6.jpg">
        <div class="hero text-center">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        <span class="text-title">Hola, Soy Yonny cuesta</span>
                    </h1>
                    <h2 class="subtitle">
                        <span class="text-subtitle">Y te doy la bienvenida a mi WEB</span>
                    </h2>
                    <!-- Botón descargar cv -->
                    @foreach ($aboutme as $about)
                        <a href="{{ asset($about->cvs) }}" target="_blank" class="button is-primary is-outlined">
                            <span class="icon">
                                <i class="fas fa-download"></i>
                            </span>
                            <span>Descargar CV</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="content-principal">
        <div class="aboutme mt-4" id="profile-contact">
            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 profile">
                            @foreach ($aboutme as $about)
                                <div class="profile-contact">
                                    <img src="{{ asset($about->photo) }}" alt="">
                                    <ul>
                                        <li>

                                            <span><b>Nombre:</b> {{ $about->fullname }}</span>
                                        </li>
                                        <li>
                                            <span><b>Edad:</b> {{ $about->age }} años</span>
                                        </li>
                                        <li>
                                            <span><b>Email:</b> {{ $about->email }}</span>
                                        </li>
                                        <li>
                                            <span><b>Telefono:</b> {{ $about->phone }}</span>
                                        </li>
                                        <li>
                                            <span><b>Dirección:</b> {{ $about->address }}</span>
                                        </li>
                                        <li>
                                            <span><b>Perfil:</b> {{ $about->designation }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="profile-skil">
                                <h6>Habilidades</h6>
                                <ul>
                                    <li>
                                        <span>HTML</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="90"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>CSS</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="90"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>JAVASCRIPT</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>PHP</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 65%"
                                                aria-valuenow="65" aria-valuemin="0" aria-valuemax="65"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>LARAVEL</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="90"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>SQL</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="90"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>WORDPRESS</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="90"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <span>GIT & GITHUB</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 70%"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="90"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            @foreach ($aboutme as $ab)
                                <div class="profile-text_profile">
                                    <h4>Sobre mi</h4>
                                    <hr>
                                    <p>

                                        @php
                                            // Recorrer el perfil y poner un salto de linea cada que encuentre un punto
                                            $profile = $ab->profile;
                                            $profile = str_replace('. ', '. <br>', $profile);

                                            echo $profile;
                                        @endphp
                                    </p>

                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="services" id="services">
            <h4 class="title">
                Servicios
                <hr>
            </h4>
            <div class="container">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-icon">
                                    <span>
                                        <li class="{{ $service->icon }}"></li>
                                    </span>
                                </div>
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-content">
                                            <p class="card-title">{{ $service->name }}</p>
                                            <p class="card-text">
                                                {{ $service->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Inicio logros -->
        <div class="logros text-center">
            <div class="container">
                <div class="row">
                    @foreach ($awards as $award)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-icon">
                                    <span>
                                        <li class="{{ $award->icon }}"></li>
                                    </span>
                                </div>
                                <div class="card-content">
                                    <div class="media">
                                        <div class="media-content">
                                            <p class="card-number">
                                                {{ $award->quantity }}
                                            </p>
                                            <p class="card-text">
                                                {{ $award->title }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>


        <!-- Fin logros -->

        <!-- Portafolio -->
        <div class="portafolio" id="portfolio">
            <div class="container">
                <h4 class="title">
                    Portafolio
                    <hr>
                </h4>
                <div class="row">
                    @foreach ($portfolios as $port)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-img-top">
                                    @if ($port->photo)
                                        <img src="{{ asset($port->photo) }}" alt="">
                                    @else
                                        <img src="/assets/img/3.jpg" alt="">
                                    @endif
                                </div>
                                <div class="card-content">
                                    <ul>
                                        <li>
                                            <span class="card-title">
                                                {{ $port->title }}
                                            </span>
                                        </li>

                                        <li>
                                            <span class="card-text">
                                                <span>
                                                    {{ $port->category->name ?? '' }} / {{ $port->date_created }}
                                                </span>
                                                <a href="{{ route('portfolio', $port->id) }}" target="_blank">
                                                    <span class="fas fa-eye"></span>
                                                </a>
                                            </span>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Fin portafolio -->

        <!-- Inicio comentarios clientes -->
        <div class="comments">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider-comment">
                            <div class="slider-item">
                                <div class="media">
                                    <div class="media-info">
                                        <span class="fas fa-user"></span><br>
                                        <h6>
                                            {{ $testimonial->name }}
                                        </h6>
                                    </div>

                                    <div class="media-content">
                                        <p class="card-text">
                                            {{ $testimonial->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fin comentarios clientes -->

        <!-- Inicio Blog -->
        <div class="blog" id="blog">
            <div class="container">
                <h4 class="title">
                    Blog
                    <hr>
                </h4>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-img-top">
                                    @if ($post->photo)
                                        <img src="{{ asset($post->photo) }}" alt="">
                                    @else
                                        <img src="/assets/img/1.jpg" alt="">
                                    @endif
                                </div>
                                <div class="card-content">
                                    <h6 class="card-title">
                                        {{ $post->title }}
                                    </h6>

                                    <div class="card-text">

                                        <p>
                                            @php
                                                // Mostrar solo los primeros 100 caracteres
                                                $content = substr($post->description, 0, 100);
                                                echo $content;
                                            @endphp

                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <ul>
                                            <li>
                                                <a href="{{ route('blog', $post->id) }}" target="_blank">
                                                    Ver más
                                                </a>
                                            </li>
                                            <li class="list-item-time">
                                                <span class="fas fa-clock"></span>
                                                <span>
                                                    {{ $post->datetime_created }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Fin Blog -->

        <!-- contact -->
        <div class="contact" id="contact">
            <div class="container">
                <h4 class="title">
                    Contacto
                    <hr>
                </h4>
                <div class="form-contact">
                    <div class="card-header bg-white">
                        <h6 class="card-title">
                            Envíame un mensaje si deseas hablar acerca de cualquier tema de interés.
                        </h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Correo">
                            </div>
                            <div class="form-group">
                                <textarea name="description" cols="30" rows="4" class="form-control" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Enviar mensaje
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fin contact -->

        </div>
        <footer class="border-top footer">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-4">
                        <h5>NAVEGACIÓN</h5>
                        <ul>
                            <li>
                                <a href="#blog">Blog</a>
                            </li>
                            <li>
                                <a href="#contact">Contacto</a>
                            </li>
                            <li>
                                <a href="#profile-contact">Sobre mi</a>
                            </li>
                            <li>
                                <a href="#services">Servicios</a>
                            </li>
                            <li>
                                <a href="#portfolio">Portafolio</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-4">

                        <h5>SOPORTE</h5>
                        <ul>
                            <li>
                                <a href="">Políticas de privacidad y seguridad</a>
                            </li>
                            <li>
                                <a href="">Términos y condiciones</a>
                            </li>
                            <li>
                                <a href="">Políticas de cookies</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>CONTACTO</h5>
                        <ul>
                            <li>
                                <a href="">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Calle 14 # 89a - 86, Medellin - Antioquia, COL</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fas fa-phone"></i>
                                    <span> (+57) 3116851031</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fas fa-envelope"></i>
                                    <span> yocumo1998@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="small text-center text-muted fst-italic">Copyright &copy; SNOW 2022</div>
            </div>
        </footer>
        <!-- JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
                integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/popper.min.js"
                integrity="sha512-eHo1pysFqNmmGhQ8DnYZfBVDlgFSbv3rxS0b/5+Eyvgem/xk0068cceD8GTlJOZsUrtjANIrFhhlwmsL1K3PKg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @yield('scripts')
        @livewireScripts

        @if (Session::has('contact-success'))
            <script>
                toastr.success("{{ Session::get('contact-success') }}");
            </script>
        @endif
</body>

</html>

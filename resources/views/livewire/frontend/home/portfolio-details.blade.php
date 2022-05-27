<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Portafolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

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
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
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

    <div class="portafolio-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portafolio-header-content">
                        <h1>{{ $portfolio->title }}</h1>
                        <p>
                            {{ $portfolio->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portafolio-details">
        <div class="portafolio-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portafolio-content-content">
                           @if ($portfolio->photo)
                           <img src="{{ asset($portfolio->photo) }}" alt="" width="100%" height="400px">
                           @else
                           <img src="/assets/img/3.jpg" alt=""  width="100%" height="400px">
                           @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <div class="row">
                                <div class="portafolio-information">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Información del proyecto</h3>
                                        </div>
                                        <div class="card-content">
                                            <ul>
                                                <li>
                                                    <strong>Categoria:</strong>
                                                    <span>
                                                        {{ $portfolio->category->name ?? '' }}
                                                    </span>
                                                </li>
                                                <li>
                                                    <strong>Cliente:</strong>
                                                    <span>
                                                        {{ $portfolio->portf_client }}
                                                    </span>
                                                </li>
                                                <li>
                                                    @if ($portfolio->date_created)
                                                        <strong>Fecha de creación:</strong>
                                                        <span>
                                                            {{ $portfolio->date_created }}
                                                        </span>
                                                    @else
                                                    @endif

                                                </li>
                                                <li>
                                                    @if ($portfolio->portf_url)
                                                        <strong>URL:</strong>
                                                        <span>
                                                            {{ $portfolio->portf_url }}
                                                        </span>
                                                    @else
                                                    @endif

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="portafolio-information">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Tags</h3>
                                        </div>
                                        <div class="card-content-tecnology">
                                            <ul>
                                                @foreach ($portfolio->tags as $tag)
                                                    <li>
                                                        <span>{{ $tag->name }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <!-- Politicas y términos y condiciones -->
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>

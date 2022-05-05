<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blog |Detalles</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/assets/css/styles.css">

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
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Sobre mi</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Portafolio</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Iniciar sesión</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Crear cuenta</a>
                </li>
            </ul>
        </div>

    </div>


    <div class="blog-details-header">
        <div class="blog-details-header-text">
            <h1 class="blog-details-title">{{ $post->title }}</h1>
            <span class="lead blog-details-date">{{ $post->datetime_created }}</span>
        </div>
    </div>
    <div class="blog-details">
        <div class="description">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            {{ $post->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="cotainer section-one">
            <div class="downloads-method">
                <div class="card">
                    <div class="card-header">
                        <h3>Archivos de descarga</h3>
                    </div>
                    <div class="card-content">
                        <ul>
                            @foreach ($post->resources as $resource)
                                <li>
                                    <strong>{{ $resource->name }}:</strong>
                                    <span>{{ $resource->url }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="module">
                @if ($post->modules)
                    @foreach ($post->modules as $module)
                        <h4 class="title">
                            {{ $module->title }}
                        </h4>
                        <div class="content-module">
                            <ul>
                                <li>
                                    <h6>{{ $module->subtitle }}</h6>
                                    <p>
                                        {{ $module->content }}
                                    </p>
                                </li>

                            </ul>
                        </div>
                    @endforeach
                @else
                    <h4 class="title">
                        No hay módulos
                    </h4>
                @endif


            </div>
            <div class="tags">

                <div class="card">
                    <div class="card-header">
                        <h3>Tags</h3>
                    </div>
                    <div class="card-content-tecnology">
                        <ul>
                            @foreach ($post->tags as $tag)
                                <li>
                                    <span>{{ $tag->name }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>

        </div>

        <div class="gallery">
            <div class="container">
                <div class="row">
                    @if ($post->galleries)
                        @foreach ($post->galleries as $gallery)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset($gallery->photo) }}" alt="">
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <div class="section-comment">
            <div class="container">
                <div class="row">
                    @foreach ($post->comments as $comment)
                        <div class="col-md-3">
                            <ul>
                                <li>
                                    <span>
                                        {{ $comment->datetime_create }}
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        Por: {{ $comment->name }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 section-comment-text">
                            <p>
                                {{ $comment->description }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="section-form-comment">
            <div class="container">
                <div class="form-comment">
                   
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <textarea name="description" cols="30" rows="4" class="form-control" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-primary">Comentar</button>
                        </div>
                    </form>
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
                            <a href="">Blog</a>
                        </li>
                        <li>
                            <a href="">Sobre mi</a>
                        </li>
                        <li>
                            <a href="">Servicios</a>
                        </li>
                        <li>
                            <a href="">Portafolio</a>
                        </li>
                        <li>
                            <a href="">Blog</a>
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

    <!-- jQuery -->
    <script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('comment_added'))
        <script>
            toastr.success("{!! Session::get('comment_added') !!}");
        </script>
    @endif
</body>

</html>

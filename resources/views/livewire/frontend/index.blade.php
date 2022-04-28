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

    <!-- My Styles -->
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
                <li class="nav-item ">
                    <a class="nav-link" href="login.html">Iniciar sesión</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="register.html">Crear cuenta</a>
                </li>
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
                    <a href="#" class="button is-primary is-outlined">
                        <span class="icon">
                            <i class="fas fa-download"></i>
                        </span>
                        <span>Descargar CV</span>
                    </a>
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
                            <div class="profile-contact">
                                <img src="/assets/img/fotop.png" alt="">
                                <ul>
                                    <li>
                                       
                                        <span><b>Nombre:</b> Yonny cuesta moreno</span>
                                    </li>
                                    <li>
                                        <span><b>Edad:</b> 24 años</span>
                                    </li>
                                    <li>
                                        <span><b>Email:</b> yocumo1998@gmail.com</span>
                                    </li>
                                    <li>
                                        <span><b>Telefono:</b> (+57) 3116851031</span>
                                    </li>
                                    <li>
                                        <span><b>Dirección:</b> Calle 14 # 89a - 86, Medellin - Antioquia, COL</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-skil">
                                <h6>Habilidades</h6>
                                <ul>
                                    <li>
                                        <span>HTML</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%"
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
                            <div class="profile-text_profile">
                                <h4>Sobre mi</h4>
                                <hr>
                                <p>
                                    Considero ser una persona responsable y activa, con compromiso por las labores a
                                    realizar, manejo buenas relaciones humanas. Disponibilidad al crecimiento tanto
                                    personal
                                    como de grupo. Buenos valores éticos y morales, muchos de ellos inculcados desde el
                                    hogar y otros adquiridos por la sociedad.

                                </p>
                                <p>
                                    A la hora de aprender soy el primer interesado
                                    en hacerlo, no importa que tan complicado pueda serlo. Soy amante a los deportes
                                    como el
                                    fútbol, escuchar música y en mis ratos libres en su gran mayoría lo paso
                                    realizando
                                    cursos online sobre temas de interés como lo son:

                                </p>
                                <p>
                                    Desarrollo web, Lógica de
                                    programación, Inglés, Diseño y Desarrollo de software entre otros, en canales de
                                    YouTube
                                    o en plataformas virtuales como Udemy, Google Actívate, Coursera entre otras.
                                </p>
                            </div>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-icon">
                                <span>
                                    <li class="fas fa-code"></li>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="card-title">Desarrollo</p>
                                        <p class="card-text">
                                            Se refiere a un conjunto de actividades informáticas dedicadas al proceso de
                                            creación, diseño, despliegue y compatibilidad de software.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-icon">
                                <span>
                                    <li class="fas fa-pen"></li>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="card-title">Diseño</p>
                                        <p class="card-text">
                                            Proceso en que se aplican ciertas técnicas y principios con el propósito de
                                            definir un dispositivo, un proceso o un Sistema, con suficientes detalles
                                            como para permitir su interpretación y realización física.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-icon">
                                <span>
                                    <li class="fas fa-laptop-code"></li>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="card-title">Programación</p>
                                        <p class="card-text">
                                            Es el arte del proceso por el cual se limpia, codifica, traza y protege el
                                            código fuente de programas computacionales, en otras palabras, es indicarle
                                            a la computadora lo que tiene que hacer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inicio logros -->
        <div class="logros text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-icon">
                                <span>
                                    <li class="fas fa-check"></li>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="card-number">8</p>
                                        <p class="card-text">
                                            Trabajos completados
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-icon">
                                <span>
                                    <li class="fas fa-users"></li>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="card-number">1</p>
                                        <p class="card-text">
                                            Clientes totales
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-icon">
                                <span>
                                    <li class="fas fa-award"></li>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="card-number">5</p>
                                        <p class="card-text">
                                            Certificados
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/img/1.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <ul>
                                    <li>
                                        <span class="card-title">
                                            Inventario
                                        </span>
                                    </li>

                                    <li>
                                        <span class="card-text">
                                            <span>
                                                web design / 18 Sep. 2018
                                            </span>
                                            <a href="portafolio.html">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                        </span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/img/2.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <ul>
                                    <li>
                                        <span class="card-title">
                                            Inventario
                                        </span>
                                    </li>

                                    <li>
                                        <span class="card-text">
                                            <span>
                                                web design / 18 Sep. 2018
                                            </span>
                                            <a href="portafolio.html">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                        </span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/img/3.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <ul>
                                    <li>
                                        <span class="card-title">
                                            Inventario
                                        </span>
                                    </li>

                                    <li>
                                        <span class="card-text">
                                            <span>
                                                web design / 18 Sep. 2018
                                            </span>
                                            <a href="portafolio.html">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                        </span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
                                            Juan Perez
                                        </h6>
                                    </div>

                                    <div class="media-content">
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus,
                                            quisquam.
                                            Quasi, quisquam Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Doloribus, quisquam.
                                            Quasi, quisquam.
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/img/1.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <h6 class="card-title">
                                    Sistema inventario
                                </h6>

                                <div class="card-text">

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quisquam.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <ul>
                                        <li>
                                            <a href="blog.html">
                                                Ver más
                                            </a>
                                        </li>
                                        <li class="list-item-time">
                                            <span class="fas fa-clock"></span>
                                            <span>
                                                10/04/2022 12:00:03 pm
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/img/1.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <h6 class="card-title">
                                    Sistema inventario
                                </h6>

                                <div class="card-text">

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quisquam.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <ul>
                                        <li>
                                            <a href="blog.html">
                                                Ver más
                                            </a>
                                        </li>
                                        <li class="list-item-time">
                                            <span class="fas fa-clock"></span>
                                            <span>
                                                10/04/2022 12:00:03 pm
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/img/1.jpg" alt="">
                            </div>
                            <div class="card-content">
                                <h6 class="card-title">
                                    Sistema inventario
                                </h6>

                                <div class="card-text">

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quisquam.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <ul>
                                        <li>
                                            <a href="blog.html">
                                                Ver más
                                            </a>
                                        </li>
                                        <li class="list-item-time">
                                            <span class="fas fa-clock"></span>
                                            <span>
                                                10/04/2022 12:00:03 pm
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

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
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">

                            <input type="email" class="form-control" placeholder="Correo">
                        </div>
                        <div class="form-group">

                            <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>

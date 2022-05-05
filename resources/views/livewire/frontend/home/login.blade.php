<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<style>
    .login {
        margin: 8% 30% 5% 35%;
    }

    .login .card {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        height: 400px;
        width: 400px;
        border-radius: 25px;
    }

</style>

<body>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-12 login-form">
                    <div class="card">
                        <div class="card-header">
                            <h3>Iniciar sesión</h3>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{ route('frontend.login.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Correo electrónico">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </div>
                                    <ul>
                                        <li>
                                            <span>¿olvidaste tu contraseña?</span>
                                            <a href="changepassword.html">¡cambiar contraseña!</a>
                                        </li>
                                        <li>
                                            <span>¿no tienes una cuenta?</span>
                                            <a href="{{ route('frontend.create') }}">¡crear cuenta!</a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- jQuery -->
<script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (Session::has('password_error'))
    <script>
        toastr.error("{!! Session::get('password_error') !!}");
    </script>
@endif

@if (Session::has('email_error'))
    <script>
        toastr.error("{!! Session::get('email_error') !!}");
    </script>
@endif

@if (Session::has('error_validate'))
    <script>
        toastr.error("{!! Session::get('error_validate') !!}");
    </script>
@endif

</html>

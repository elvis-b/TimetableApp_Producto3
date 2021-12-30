<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="public/css/login.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/login.css')}}">

    <title>Aula</title>
</head>

<!------ Include the above in your HEAD tag ---------->
<body>
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif

<div class="login-wrapper">
    <div class="container h-100 animate__animated animate__fadeIn">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <h2 style="text-align: center">Welcome to TimeTable</h2>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="{{ route('auth') }}" role="form">
                        {{ csrf_field() }}
                        <div class="input-group mb-3 animate__animated animate__fadeInDown animate__delay-2s">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control input_user" value=""
                                   placeholder="correo electrónico">
                        </div>
                        <div class="input-group mb-2 animate__animated animate__fadeInDown animate__delay-1s">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value=""
                                   placeholder="contrase&ntilde;a">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container animate__animated animate__fadeIn animate__delay-1s">
                            <button type="submit" name="button" class="btn login_btn">Entrar</button>
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container animate__animated animate__fadeIn animate__delay-1s">
                            <a href="{{ route('login.create') }}" class="btn btn-success" role="button">Registrarme</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>

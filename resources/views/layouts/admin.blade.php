<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aula Virtual</title>

    <!-- Custom CSS -->
    @section('styles_laravel')

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />


    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/elvis.css')}}">

    @show

    @yield('mis_estilos')
  </head>

  <body>
    <!-- toolbar user -->
    <nav class="navbar navbar-dark bg-custom">
      <!-- Navbar content -->
      <a class="navbar-brand" href="#">TimeTable App</a>

      <div class="justify-content-end my-lg-0">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logout') }}">Cerrar sesión</a>
          </li>
        </ul>

      </div>
    </nav>

    <!-- container -->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('success'))
    <div class="alert alert-info">
        {{Session::get('success')}}
    </div>
    @endif

   <!-- siderbar -->
    <div class="row">
      <div class="sidebar" style=" width: 230px; padding: 0">
        <div class="list-group">
            <a class=" menu-item" href="{{action('UserController@index')}}"><span>Usuarios</span></a>
            <a class="menu-item " href="{{action('CourseController@index')}}"><span>Cursos</span></a>
            <a class="menu-item" href="{{action('SubjectController@index')}}"><span>Asignaturas</span></a>
            <a class="menu-item" href="{{action('ScheduleController@index')}}"><span>Horarios</span></a>
            <a class="menu-item" href="{{action('ClassroomController@index')}}"><span>Clases</span></a>
        </div>
      </div>


      <div class="col-10">
        <div class="container">
          <!-- content -->
          @yield('content')
        </div>
      </div>

    </div>

          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>

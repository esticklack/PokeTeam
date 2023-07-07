<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>



    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('images/infst2-icon.png') }}">

        <!-- Scripts -->
        <script src="https://unpkg.com/feather-icons"></script>

    @yield('scripts')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index INFST2</title>
</head>
<body>
<div class="container">
    @include('partials.navigation')


<main>
      <div class="jumbotron">
<img src="https://www.freepnglogos.com/uploads/gotta-catch-em-all-transparent-pokemon-logo-11.png" style="width: 300px; height: 200px; ">
         </p>
      </div>
    </main>

    <div class="row justify-content-center">
        <div class="col-lg-6 my-4">
          <h1>Editar Usuario</h1>
          <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
          @if (Auth::check() && Auth::user()->avatar)
                <img src="{{ asset('avatars/' . Auth::user()->avatar) }}" alt="Avatar" width="100">
            @else
                <img src="{{ asset('avatars/default-avatar.jpg') }}" alt="Default Avatar" width="100">
            @endif
            @csrf
            <input type="file" name="avatar">
        
        </form>
          <div class="mb-3">
            <label for="informacion" class="form-label">Cambiar Información</label>
            <textarea class="form-control" id="informacion" rows="3"></textarea>
          </div>

          <form action="{{ route('user.updateContraseña') }}"method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Contraseña Actual</label>
                    <input type="password" id="current_password" name="current_password">
                </div>
                <div class="mb-3"> <label for="new_password" class="form-label">Nueva Contraseña</label>
                    <input type="password" id="new_password" name="new_password">
                </div>
                <div class="mb-3"> <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label >
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation">
                </div>    
            <button type="submit" id="bt-guardar" class="btn btn-success btn-block my-2">Guardar Cambios</button>
          </div>
        </div>
</div>








    <footer>
      <p>&copy;Todos los derechos reservados, Poketeam inc.</p>
    </footer>
  </div>
</body>


</html>
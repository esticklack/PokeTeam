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


<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
     <img src="https://e7.pngegg.com/pngimages/840/512/png-clipart-pokemon-diamond-and-pearl-pokemon-platinum-pokemon-trainer-video-game-others-hat-toddler.png" style="width: 100px; height: 100px; border:">
      <div class="card-body">
        <h5 class="card-title">Entrenador: El xocas</h5>
        <p class="card-text">Entrenador: Novato</p>
        <p class="card-text">Ganadas: 7 </p>
        <p class="card-text">Perdidas: 6 </p>
        <p class="card-text">Pokemons obtenidos: 107 </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/21e05d6b-4091-421e-9a14-4153e895d1a6/dbdm9vf-3f32adc0-6602-4e03-acf8-3a8678258e63.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzIxZTA1ZDZiLTQwOTEtNDIxZS05YTE0LTQxNTNlODk1ZDFhNlwvZGJkbTl2Zi0zZjMyYWRjMC02NjAyLTRlMDMtYWNmOC0zYTg2NzgyNThlNjMucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.ywIahQ71KZFbg_9bzXlmn8wt0BxHNjGFHkd5RfO3DVY" class="card-img-top" style="width: 100px; height: 100px; border: 2px solid red>
      <div class="card-body">
        <h5 class="card-title">Inventario</h5>
        <p class="card-text">Objetos obtenidos: 9 </p>
        <p class="card-text">MVP obtenidos:     9 </p>
        <p class="card-text">Comida obtenida     17 de comida</p>
        <p class="card-text">Dinero:            123 pokedolar</p>
      </div>
    </div>
  </div>
  
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="https://www.pokemontimes.it/home/wp-content/uploads/2014/04/medaglie_di_Kalos_pokemon_center_pokemontimes-it.jpg" class="card-img-top" style="width: 100px; height: 100px; border: 2px solid red>
      <div class="card-body">
        <h5 class="card-title">Medallas</h5>
        <p class="card-text">Medallas obtenidas: 3/8</p>
      </div>
    </div>
  </div>
  

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Ultimo acceso guardado del juego
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal3232 title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>




<p class="fs-1">Imagenes de algunas de las zonas de juego</p>

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.wikidexcdn.net/mwuploads/wikidex/b/b7/latest/20100206024454/Pueblo_lavanda_HGSS.png" class="d-block w-100" alt="width: 100px; height: 100px; border: 2px solid red">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pueblo lavanda</h5>
        <p>Es un pueblo fantasmal de las llanuras.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://static.wikia.nocookie.net/espokemon/images/6/68/Pueblo_Hojaverde_Pt.png/revision/latest?cb=20140809181040" class="d-block w-100" alt="width: 100px; height: 100px; border: 2px solid red">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pueblo hoja verde</h5>
        <p>Un lugar de tranquilidad y paz.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.wikidexcdn.net/mwuploads/wikidex/f/f7/latest/20131029161811/Pueblo_Terracota.jpg" class="d-block w-100" alt="width: 100px; height: 100px; border: 2px solid red">
      <div class="carousel-caption d-none d-md-block">
        <h5>Pueblo terracota</h5>
        <p>Pueblo de los antiguos terracotas.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>








    <footer>
      <p>&copy;Todos los derechos reservados, Poketeam inc.</p>
    </footer>
  </div>
</body>


</html>

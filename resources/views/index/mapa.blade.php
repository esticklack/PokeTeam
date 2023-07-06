<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

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
</div>


<p class="fs-1">Mapa</p>

<div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://pbs.twimg.com/media/FDIIeyZWUAoz0Vr.png"  alt="Imagen 1">
        </div>
        <div class="carousel-item">
          <img src="https://whackahack.com/foro/attachments/scan-red-rescue-png.9488/" alt="Imagen 2">
        </div>
        <div class="carousel-item">
            <img src="https://pbs.twimg.com/media/FD_dXgrWQAUTD4R?format=jpg&name=large"alt="Imagen 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>



<style>
    #carousel{
        width: 750px;
        height:450px;
    }

    #chat {

      background-color: black;
      color: #484848;
      

      width: 400px;
      height: 450px;
      background-image: url('https://w7.pngwing.com/pngs/180/312/png-transparent-team-fortress-2-circle-angle-pokeball-red-quotation-pokeball.png');
      background-size: cover;
      background-position: right;
      border: 4px solid #000;
      margin: auto;
      margin-top: -464px;
      margin-left: 800px;
      padding: 20px;
      border-radius: 10px;
    }


 
  </style>

  <script>
    //CHAT
    window.addEventListener("DOMContentLoaded", function () {
      var chatBox = document.getElementById("chat");
      var inputField = document.getElementById("input");
      var sendButton = document.getElementById("send");
      var usuario = "User: ";
      sendButton.addEventListener("click", function () {
        var message = usuario + inputField.value;
        if (message !== "") {
          addMessage(message);
          inputField.value = "";
        }
      });

      function addMessage(message) {
        var chatMessage = document.createElement("p");
        chatMessage.textContent = message;
        chatBox.appendChild(chatMessage);
      }
    });
  </script>
</head>

<body>


          <div id="chat">
          <h2>Chat del Lugar</h2>
          <input type="text" id="input" placeholder="Escribe un mensaje...">
          <button id="send">Enviar</button>
          </div>

</body>


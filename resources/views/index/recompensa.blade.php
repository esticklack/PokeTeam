@extends('Layouts.app')


@section('scripts')

<script>
  
  $(document).ready(function() {  
      $('#botonRecompensa').click(function() {
        var email= $('#email').val();

      // var recompensasList = [
      //   100, 200, 300, 400
      // ];
      
      // var indiceAleatorio = Math.floor(Math.random() * recompensasList.length);
      // var recompObtenida = recompensasList[indiceAleatorio];
        
      

      $.ajax({
                 url: "http://poketeam.test/api/verificar-recompensa",
                 type: 'POST',
                 data: { email: email },
                  dataType: 'json',
                  success: function(response) {
                  if (response.id) {
                      var id = response.id;
                      
                      event.preventDefault();
                      
                      
                      $.ajax({
                      url: 'http://poketeam.test/api/guardar-recompensa/' + id,
                      type: 'POST',
                      success: function(response){
                        var message = 'Has recibido ' + response.recompensaAleatoria + ' monedas.';
                      
                      $('#recompensa').text(message);}
                            });
                      
                      // .done(function(data){

                      //     alert("Se ha guardado correctamente");
                      //     var url = 'http://poketeam.test/recompensa/';
                      //     $(location).attr('href', url);
                          
                      // });
  

                   } else {
                     window.alert("Email no existe");    
                  }
                 }
                 });
        
     });

    });
    
    function mostrarRectangulo() {
        var rectangulo = document.getElementById("rectangulo");
        rectangulo.style.display = "block";
    }
  </script>    

@endsection








@section('content')
<!DOCTYPE html>
<html>
<head>
  <style>
    
    /* Estilos para el fondo */
    body {
      background-color: purple;
    }
    
    /* Estilos para el botón */
    .boton-recompensa {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 200px;
      height: 50px;
      margin: 0 auto;
      background-color: green;
      color: white;
      font-size: 20px;
      font-weight: bold;
      border-radius: 10px;
      border: none;
      cursor: pointer;
    }
    .rectangulo-verde {
      border: 2px solid green;
      background-color: lightgreen;
      padding: 10px;
      width: fit-content;
      margin: 0 auto;
    }
    #rectangulo  {
      width: 400px;
      height: 40px;
      background-color: yellow;
      animation: blink 1s linear infinite;
      display: none;
  }

  @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
  }
    
  </style>
</head>
<body>
    
  <div class="recompensa-contenedor rectangulo-verde" >
  <h2 style="text-align:center">RECOMPENSA DIARIA</h2> 
  <h5 style="text-align:center">Ingresa tu email para recibirla</h5>
  <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">    
    <div class="recompensa-contenedor rectangulo-verde" >
    
    <button id="botonRecompensa" class="boton-recompensa" onclick="mostrarRectangulo()">Obtener Recompensa</button>
      
      <img src="{{ asset('images/cofre.png') }}" width="400" height="400" >  
      <div id="rectangulo">
      <h4 style="text-align:center" id="recompensa"></h4>
      </div>
    </div>
    
  </body>
    
</html>

@endsection


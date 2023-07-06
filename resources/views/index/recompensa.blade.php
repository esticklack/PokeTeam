@extends('Layouts.app')


@section('scripts')

<script>
  
  $(document).ready(function() {  
      $('#botonRecompensa').click(function() {
        var email= $('#email').val();
        $("#correo_invalido_user_help_block").hide();
        $("#amarillo").hide();
        $("#naranjo").hide();
        $("#morado").hide();
      
      

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
                      url: 'http://poketeam.test/api/verificar-tiempo/' + id,
                      type: 'POST',
                      success: function(response){

                        var oro = response.oro;

                        if (response.tiempo){
                          $.ajax({
                            url: 'http://poketeam.test/api/guardar-recompensa/' + id,
                            type: 'POST',
                            success: function(response){
                              
                              var rcmpObte = response.recompensaAleatoria;

                              var sumaOroRcmp = oro + rcmpObte;

                              var messageOro = 'Tu oro actual: ' + sumaOroRcmp;
                              mostrarRectanguloMorado()
                            $('#recompensa3').text(messageOro);
                              
                              var message = 'Has recibido ' + rcmpObte + ' monedas.';
                              mostrarRectanguloAmarillo()
                            $('#recompensa').text(message);
                              }
                            });
                        }else if (response.tiempo==false){
                              var message2 = 'Debes esperar 24 horas';
                              mostrarRectanguloNaranjo()
                              $('#recompensa2').text(message2);
                              var messageOro = 'Tu oro actual: ' + response.oro;
                              mostrarRectanguloMorado()
                            $('#recompensa3').text(messageOro);
                        }else{
                          window.alert("Ha ocurrido un error inesperado");
                          var messageOro = 'Tu oro actual: ' + response.oro;
                              mostrarRectanguloMorado()
                            $('#recompensa3').text(messageOro);
                        }
                      }
                      
                    
                      });
                      
                      
                      
                      // .done(function(data){

                      //     alert("Se ha guardado correctamente");
                      //     var url = 'http://poketeam.test/recompensa/';
                      //     $(location).attr('href', url);
                          
                      // });
  

                   } else {
                    $("#correo_invalido_user_help_block").show();    
                  }
                 }
                 });
        
     });

    });
    function mostrarRectanguloAmarillo() {
        var rectangulo = document.getElementById("amarillo");
        rectangulo.style.display = "block";
    }
    function mostrarRectanguloNaranjo() {
        var rectangulo = document.getElementById("naranjo");
        rectangulo.style.display = "block";
    }
    function mostrarRectanguloMorado() {
        var rectangulo = document.getElementById("morado");
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
    #amarillo  {
      width: 400px;
      height: 40px;
      background-color: yellow;
      animation: blink 2s linear infinite;
      display: none;
  }
  #naranjo  {
      width: 400px;
      height: 40px;
      background-color: orange;
      animation: blink 2s linear infinite;
      display: none;
  }
  #morado  {
      width: 400px;
      height: 40px;
      background-color: white;
      animation: blink 2s linear infinite;
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
    
  <div class="card-4 recompensa-contenedor rectangulo-verde">
    
    
    <h2 style="text-align:center">RECOMPENSA DIARIA</h2> 
    <h5 style="text-align:center">Ingresa tu email para recibirla</h5>
    
    <label for="email">Email</label>
        
  
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">    
      <div id="correo_invalido_user_help_block" class="form-text" style="display: none;">
                <span class="badge text-bg-danger">El correo ingresado no es válido</span>
            </div> 
    
      <div class="recompensa-contenedor rectangulo-verde" >
    <div class="d-flex">
    <button id="botonRecompensa" class=" boton-recompensa">Obtener Recompensa</button>
    </div>  
      <img src="{{ asset('images/cofre.png') }}" width="400" height="400" >  
      <div id="amarillo">
      <h4 style="text-align:center" id="recompensa"></h4>
      </div>
      <div id="naranjo">
      <h4 style="text-align:center" id="recompensa2"></h4>
      </div>
      <div id="morado">
      <h4 style="text-align:center" id="recompensa3"></h4>
      </div>      
    </div>
    
  </body>
    
</html>

@endsection


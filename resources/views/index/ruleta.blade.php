@extends('Layouts.app')

@section('scripts')
<script>

   
        var options = [ 100, 300, 100, 100, 100, 2000, 100, 100, 100, 300, 100];

        var startAngle = 0;
        var arc = Math.PI / (options.length / 2);
        var spinTimeout = null;

        var spinArcStart = 10;
        var spinTime = 0;
        var spinTimeTotal = 0;

        var ctx;

        function byte2Hex(n) {
            var nybHexString = "0123456789ABCDEF";
            return String(nybHexString.substr((n >> 4) & 0x0F, 1)) + nybHexString.substr(n & 0x0F, 1);
        }

        function RGB2Color(r, g, b) {
            return '#' + byte2Hex(r) + byte2Hex(g) + byte2Hex(b);
        }

        function getColor(item, maxitem) {
            var phase = 0;
            var center = 128;
            var width = 127;
            var frequency = Math.PI * 2 / maxitem;

            red = Math.sin(frequency * item + 2 + phase) * width + center;
            green = Math.sin(frequency * item + 0 + phase) * width + center;
            blue = Math.sin(frequency * item + 4 + phase) * width + center;

            return RGB2Color(red, green, blue);
        }

        function drawRouletteWheel() {
            var canvas = document.getElementById("canvas");
            if (canvas.getContext) {
                var outsideRadius = 200;
                var textRadius = 160;
                var insideRadius = 125;

                ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, 500, 500);

                ctx.strokeStyle = "black";
                ctx.lineWidth = 2;

                ctx.font = 'bold 12px Helvetica, Arial';

                for (var i = 0; i < options.length; i++) {
                    var angle = startAngle + i * arc;
                    //ctx.fillStyle = colors[i];
                    ctx.fillStyle = getColor(i, options.length);

                    ctx.beginPath();
                    ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
                    ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
                    ctx.stroke();
                    ctx.fill();

                    ctx.save();
                    ctx.shadowOffsetX = -1;
                    ctx.shadowOffsetY = -1;
                    ctx.shadowBlur = 0;
                    ctx.shadowColor = "rgb(220,220,220)";
                    ctx.fillStyle = "black";
                    ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius,
                        250 + Math.sin(angle + arc / 2) * textRadius);
                    ctx.rotate(angle + arc / 2 + Math.PI / 2);
                    var text = options[i];
                    ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
                    ctx.restore();
                }

                //Arrow
                ctx.fillStyle = "black";
                ctx.beginPath();
                ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
                ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
                ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
                ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
                ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
                ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
                ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
                ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
                ctx.fill();
            }
        }

        function spin() {
            spinAngleStart = Math.random() * 10 + 10;
            spinTime = 0;
            spinTimeTotal = Math.random() * 3 + 4 * 1000;
            rotateWheel();
        }

        function rotateWheel() {
            spinTime += 30;
            if (spinTime >= spinTimeTotal) {
                stopRotateWheel();
                return;
            }
            var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
            startAngle += (spinAngle * Math.PI / 180);
            drawRouletteWheel();
            spinTimeout = setTimeout('rotateWheel()', 30);
        }

        function stopRotateWheel() {
            clearTimeout(spinTimeout);
            var degrees = startAngle * 180 / Math.PI + 90;
            var arcd = arc * 180 / Math.PI;
            var index = Math.floor((360 - degrees % 360) / arcd);
            ctx.save();
            ctx.font = 'bold 30px Helvetica, Arial';
            var text = options[index]
            ctx.fillText(text, 250 - ctx.measureText(text).width / 2, 250 + 10);
            ctx.restore();
            
            // Aquí puedes utilizar la variable 'text' que contiene la recompensa en tu solicitud AJAX
            console.log(text);
            guardarRecompensa(text);
        }

        function easeOut(t, b, c, d) {
            var ts = (t /= d) * t;
            var tc = ts * t;
            return b + c * (tc + -3 * ts + 3 * t);
        }

        document.addEventListener("DOMContentLoaded", function() {
            drawRouletteWheel();
            document.getElementById("spin").addEventListener("click", spin);
        });

        //**************************************************
        //Solicitudes BASE DE DATOS
        //**************************************************

   
function guardarRecompensa(recompensa) {
    var email = $('#email').val();
    $("#correo_invalido_user_help_block").hide();
    $("#naranjo").hide();
    $("#morado").hide();

    $.ajax({
        url: 'http://poketeam.test/api/verificar-ruleta',
        type: 'POST',
        data: { email: email },
        dataType: 'json',
        success: function(response) {
            if (response.id) {
                var id = response.id;
                $.ajax({
                    url: 'http://poketeam.test/api/guardar-oro/' + id,
                    type: 'POST',
                    data: { recompensa: recompensa },
                    dataType: 'json',
                    success: function(response) {
                        var oroGuardado = response.rcmpRuleta;
                        var verificar = response.verificar;
                        if(oroGuardado>= 300){
                        
                            var messageOro2 = 'Tu oro actual: ' + oroGuardado;
                            
                            mostrarRectanguloMorado()
                            $('#recompensa2').text(messageOro2);
                    
                    }
                        else if (oroGuardado<= 300 && verificar){
                            
                            var messageOro2 = 'Tu oro actual: ' + oroGuardado;
                           
                            mostrarRectanguloMorado()
                            $('#recompensa2').text(messageOro2);
                        }else if(oroGuardado <= 300 && verificar==false){
                            var messageOro3 = 'TIENES POCO ORO, NO TENDRAS RECOMPENSA.';
                            var messageOro2 = 'Tu oro actual: ' + oroGuardado;
                            
                            mostrarRectanguloMorado()
                            $('#recompensa2').text(messageOro2);
                            mostrarRectanguloNaranjo()
                            $('#recompensa3').text(messageOro3);
                            
                        }
                        
                    }
                });
            } else {
                $("#correo_invalido_user_help_block").show();
            }
        }
    });
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
<html lang="en">

<head>
    
    <title>Document</title>

    <style>
        #naranjo  {
      width: 400px;
      height: 70px;
      background-color: orange;
      animation: blink 2s linear infinite;
      display: none;
            }
     #morado  {
      width: 400px;
      height: 40px;
      background-color: green;
  
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
    

<div class="d-flex flex-column min-vh-100">
    <div class="container text-center">
      <h2>Gira la ruleta y obtén una recompensa</h2>
      <h5>Ingresa tu email para recibirla</h5>

      <div class="row justify-content-center">
        <div class="col-4">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
          <div id="correo_invalido_user_help_block" class="form-text" style="display: none;">
            <span class="badge bg-danger text-white">El correo ingresado no es válido</span>
          </div>
          <div class="row justify-content-center">
            <div class="col-8 d-flex align-items-center">
              <input type="button" value="Girar" class="btn btn-primary" id="spin" />
              <h5 class="ms-2">= 300 monedas</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-6">
          <div class="mx-auto text-center">
            <canvas id="canvas" width="500" height="500"></canvas>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-4">
          <div class="mx-auto text-center">
            <div id="naranjo" class="text-center">
              <h4 id="recompensa3" style="color: white"></h4>
            </div>
            <div id="morado" class="text-center">
              <h4 id="recompensa2" style="color: white"></h4>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
@endsection


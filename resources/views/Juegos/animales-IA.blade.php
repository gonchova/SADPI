<x-guest-layout>
{{-- 
    <style>
      .canvas-container {
          margin: 0 auto;
          border: 3px solid indigo;
      }
    </style> --}}
  
  <div class="flex bg-white shadow-sm sm:rounded-lg mt-2  justify-center mb-4">
    <h2 class="text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Adivinar animales</h2>
  </div>

  <div class="flex flex-col bg-white shadow-sm sm:rounded-lg mt-2 justify-center mx-1 sm:mx-40" >

        <div class="flex flex-row justify-center mb-5 mt-2">
          <h3 class="fuenteDivertida text-gray-700 uppercase antialiased text-lg font-bold sm:text-sm">Mostrame un/a: <span id="animal"></span>!</h3>
        </div>

        <div class="flex flex-row justify-center">
          <video id="video" playsinline autoplay style="width: 1px;"></video> 
          <canvas id="canvas" width="400" height="400" style="max-width: 100%;"></canvas>
          <canvas id="othercanvas" width="224" height="224" style="display: none"></canvas>
        </div>
        
        <div class="flex flex-row justify-center">
          <x-button class="mb-2 mt-4">
            <a id = "nuevoIntentoAleatorio" class="font-medium " onclick="nuevoJuegoAleatorio();">Nuevo Intento Aleatorio</a>
          </x-button>
        </div>


        <div class="flex flex-row justify-center">
          <x-button class="mb-2 mt-4 mx-2">
            <a id = "cambiar-camara" class="font-medium " onclick="cambiarCamara();">Cambiar Cámara</a>
          </x-button>
          
          <a href="{{ route('principal') }}">
            <x-button type="button" id="btnSalir" class="mx-2 mb-2 mt-4">
                {{ __('Salir') }}
            </x-button>
          </a>

        </div>
     
        <div class = "mb-2 mt-4 text-sm justify-center" id="resultado" hidden></div> 
         
        <div>
          <span>La barra indica si el sistema detecta una figura (verde) o si debe acercarla a la camara (azul)</span>
        </div>
        <div class="h-2 w-full bg-neutral-200 dark:bg-neutral-400">
          <div id="progressBar" class="h-2 bg-blue-600" style="width: 40%"></div>
        </div>
  
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>

    <script type="text/javascript">

      //Tomar y configurar el canvas
      var canvas = document.getElementById("canvas");
      var video = document.getElementById("video");
      var ctx = canvas.getContext("2d",{ willReadFrequently: true });
      var modelo = null;
      var size = 400;
      var camaras = [];
      var cantDetecciones;
      var currentStream = null;
      var facingMode = "user"; //Para que funcione con el celular (user/environment)
      var clases = ['caballo', 'cerdo','gallo','vaca'];


      (async () => {
          console.log("Cargando modelo...");
          modelo = await tf.loadLayersModel("modeloIA/model.json");
          console.log("Modelo cargado...");
      })();

      window.onload = function() {
          mostrarCamara();
          
      }

      function mostrarCamara() {

          var opciones = {
              audio: false,
              video: {
                  facingMode: "user", width: size, height: size
              }
          };

          if(navigator.mediaDevices.getUserMedia) {
              navigator.mediaDevices.getUserMedia(opciones)
                  .then(function(stream) {
                      currentStream = stream;
                      video.srcObject = currentStream;
                      procesarCamara();
                      predecir();
                  })
                  .catch(function(err) {
                      alert("No se pudo utilizar la camara :(");
                      console.log("No se pudo utilizar la camara :(", err);
                      alert(err);
                  })
          } else {
              alert("No existe la funcion getUserMedia... oops :( no se puede usar la camara");
          }
      }

      function cambiarCamara() {
          if (currentStream) {
              currentStream.getTracks().forEach(track => {
                  track.stop();
              });
          }

          facingMode = facingMode == "user" ? "environment" : "user";

          var opciones = {
              audio: false,
              video: {
                  facingMode: facingMode, width: size, height: size
              }
          };


          navigator.mediaDevices.getUserMedia(opciones)
              .then(function(stream) {
                  currentStream = stream;
                  video.srcObject = currentStream;
              })
              .catch(function(err) {
                  console.log("Oops, hubo un error", err);
              })
      }

      function nuevoJuegoAleatorio()
      { var c=0;
        var aleatorio = clases[Math.floor(Math.random() * clases.length)];
        valorAnimal = document.getElementById("animal").innerHTML;

        while (valorAnimal == aleatorio && c < 20)
         { var aleatorio = clases[Math.floor(Math.random() * clases.length)];
           c++;
         }
         document.getElementById("animal").innerHTML = aleatorio;
     
      }

      function predecir() {
        //console.log(modelo);
         

          if (modelo != null) {
              //Pasar canvas a version 224x224
              resample_single(canvas, 224, 224, othercanvas);

              var ctx2 = othercanvas.getContext("2d");

              var imgData = ctx2.getImageData(0,0,224,224);
              var arr = []; //El arreglo completo
              var arr224 = []; //Al llegar a arr224 posiciones se pone en 'arr' como un nuevo indice
              for (var p=0, i=0; p < imgData.data.length; p+=4) {
                  var red = imgData.data[p]/255;
                  var green = imgData.data[p+1]/255;
                  var blue = imgData.data[p+2]/255;
                  arr224.push([red, green, blue]); //Agregar al arr224 y normalizar a 0-1. Aparte queda dentro de un arreglo en el indice 0... again
                  if (arr224.length == 224) {
                      arr.push(arr224);
                      arr224 = [];
                  }
              }

              arr = [arr]; //Meter el arreglo en otro arreglo por que si no tio tensorflow se enoja >:(
              //Nah basicamente Debe estar en un arreglo nuevo en el indice 0, por ser un tensor4d en forma 1, 224, 224, 1
              var tensor4 = tf.tensor4d(arr);
              var resultados = modelo.predict(tensor4).dataSync();
              var mayorIndice = resultados.indexOf(Math.max.apply(null, resultados));

              
              //console.log("Prediccion", clases[mayorIndice]);
              
              console.log(resultados[mayorIndice]);
              // Si tiene una prediccion > 4 por  10 vueltas, lo toma como valido.
              
              if (resultados[mayorIndice] > 4.5) {
                cantDetecciones++;
                
                if (cantDetecciones > 5){
                  document.getElementById("resultado").innerHTML = clases[mayorIndice];
                }
                else{
                  document.getElementById("resultado").innerHTML = "Acercar figura:" + resultados[mayorIndice];
                }
              }
              else {
                  document.getElementById("resultado").innerHTML = "Acercar figura:" + resultados[mayorIndice];
                  cantDetecciones=0;
              }

              valor = resultados[mayorIndice]*11;

              if (valor > 100)
              { valor = 100;}
              
              document.getElementById("progressBar").style.width = valor+"%"
              
              if(resultados[mayorIndice] > 4.5)
              {
                document.getElementById("progressBar").classList.remove('bg-blue-600');
                document.getElementById("progressBar").classList.add('bg-green-600');
              }
              else{
                document.getElementById("progressBar").classList.remove('bg-green-600');
                document.getElementById("progressBar").classList.add('bg-blue-600');
              }
              
              
          }
          
          setTimeout(predecir, 150);
        
      }

      function procesarCamara() {
          
          var ctx = canvas.getContext("2d");

          ctx.drawImage(video, 0, 0, size, size, 0, 0, size, size);

          setTimeout(procesarCamara, 20);
      }

      /**
       * Hermite resize - fast image resize/resample using Hermite filter. 1 cpu version!
       * 
       * @param {HtmlElement} canvas
       * @param {int} width
       * @param {int} height
       * @param {boolean} resize_canvas if true, canvas will be resized. Optional.
       * Cambiado por RT, resize canvas ahora es donde se pone el chiqitillllllo
       */
      function resample_single(canvas, width, height, resize_canvas) {
          var width_source = canvas.width;
          var height_source = canvas.height;
          width = Math.round(width);
          height = Math.round(height);

          var ratio_w = width_source / width;
          var ratio_h = height_source / height;
          var ratio_w_half = Math.ceil(ratio_w / 2);
          var ratio_h_half = Math.ceil(ratio_h / 2);

          var ctx = canvas.getContext("2d", { willReadFrequently: true });
          var ctx2 = resize_canvas.getContext("2d", { willReadFrequently: true });
          var img = ctx.getImageData(0, 0, width_source, height_source);
          var img2 = ctx2.createImageData(width, height);
          var data = img.data;
          var data2 = img2.data;

          for (var j = 0; j < height; j++) {
              for (var i = 0; i < width; i++) {
                  var x2 = (i + j * width) * 4;
                  var weight = 0;
                  var weights = 0;
                  var weights_alpha = 0;
                  var gx_r = 0;
                  var gx_g = 0;
                  var gx_b = 0;
                  var gx_a = 0;
                  var center_y = (j + 0.5) * ratio_h;
                  var yy_start = Math.floor(j * ratio_h);
                  var yy_stop = Math.ceil((j + 1) * ratio_h);
                  for (var yy = yy_start; yy < yy_stop; yy++) {
                      var dy = Math.abs(center_y - (yy + 0.5)) / ratio_h_half;
                      var center_x = (i + 0.5) * ratio_w;
                      var w0 = dy * dy; //pre-calc part of w
                      var xx_start = Math.floor(i * ratio_w);
                      var xx_stop = Math.ceil((i + 1) * ratio_w);
                      for (var xx = xx_start; xx < xx_stop; xx++) {
                          var dx = Math.abs(center_x - (xx + 0.5)) / ratio_w_half;
                          var w = Math.sqrt(w0 + dx * dx);
                          if (w >= 1) {
                              //pixel too far
                              continue;
                          }
                          //hermite filter
                          weight = 2 * w * w * w - 3 * w * w + 1;
                          var pos_x = 4 * (xx + yy * width_source);
                          //alpha
                          gx_a += weight * data[pos_x + 3];
                          weights_alpha += weight;
                          //colors
                          if (data[pos_x + 3] < 255)
                              weight = weight * data[pos_x + 3] / 250;
                          gx_r += weight * data[pos_x];
                          gx_g += weight * data[pos_x + 1];
                          gx_b += weight * data[pos_x + 2];
                          weights += weight;
                      }
                  }
                  data2[x2] = gx_r / weights;
                  data2[x2 + 1] = gx_g / weights;
                  data2[x2 + 2] = gx_b / weights;
                  data2[x2 + 3] = gx_a / weights_alpha;
              }
          }


          ctx2.putImageData(img2, 0, 0);
      }

    </script>

  </x-guest-layout>
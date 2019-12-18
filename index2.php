<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <script data-main="/js/app.js" src="/js/require.js"></script>
    <style media="screen">
      #canvas {
        border: 1px solid black;
        /* display: block; */
      }
    </style>
  </head>
  <title></title>
<body>
<div class="w3-container w3-teal">
  <h1>GofL</h1>
</div>
<div class="w3-row">
      <div class="w3-col m4 l3">
    <!-- <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <p>Select field size:</p>
            <p>
              <label for="size-n">N:</label>
              <input id="size-n" class="w3-input w3-border" type="number" name="size-n" value=5>
            </p>
            <p>
              <label for="size-n">M:</label>
              <input id="size-m" class="w3-input w3-border" type="number" name="size-n" value=5>
            </p>
      </div>
    </div> -->
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <p>Select starting pattern:</p>
            <p>
                <select id="pattern-select" class="" name="">
                    <option value="blinker">Blinker</option>
                    <option value="toad">Toad</option>
                    <option value="beacon">Beacon</option>
                    <option value="glider">Glider</option>
                    <option value="acorn">Acorn</option>
                </select>
            </p>
      </div>
    </div>
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <p>Enter number of cycles:</p>
            <p>
              <input id="cycles-count" class="w3-input w3-border" type="number" name="cycles-count" value=10>
            </p>
      </div>
    </div>
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <button id="evolve-btn" class="w3-button w3-teal evolve-btn">Start</button>
        <p><i>All steps computed on server side at once. Then render.</i></p>
      </div>
    </div>
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <button id="evolve-btn-ajax" class="w3-button w3-teal evolve-btn">Start (test)</button>
            <p><i>Feature in progress. Launches evolution in ajax mode. Steps are executing and rendering one by one.</i></p>
    </div>
    </div>
  </div>
  <div class="w3-col m8 l9 w3-border table-wrap" style="padding-top: 20px;padding-bottom: 20px;text-align: center;">

      <canvas id='canvas' width='500' height='500'></canvas>

    <p id='showCoords'></p>

  	</div>
</div>





  <script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function(){ // Аналог $(document).ready(function(){
        drawGrid();
    });

    document.getElementById("canvas").addEventListener("click", getCoordinates);

    function drawGrid() {

        var canvas = document.getElementById('canvas');
        if (canvas.getContext) {

          var context = canvas.getContext('2d');

          for(var x=0.5;x<500;x+=10) {
            context.moveTo(x,0);
            context.lineTo(x,500);
          }

          for(var y=0.5; y<500; y+=10) {
            context.moveTo(0,y);
            context.lineTo(500,y);

        }

        // context.strokeStyle='grey';
        // context.stroke();

    }
  }

  function getCoordinates(e) {
    var canvas = document.getElementById('canvas');
    var rect = canvas.getBoundingClientRect();
      var x = event.clientX - rect.left;
      var y = event.clientY - rect.top;
      x = Math.ceil(x / 10);
      y = Math.ceil(y / 10);
      var coords = "X coordinates: " + x + ", Y coordinates: " + y;
      document.getElementById('showCoords').innerHTML = coords;
      x = (x * 10) - 10;
      y = (y * 10) - 10;
      colorCell(x,y);
    }

    function colorCell(x,y) {
      var canvas = document.getElementById('canvas');
      if (canvas.getContext) {
        var context = canvas.getContext('2d');
        context.fillRect(x, y, 10, 10);
      }
    }
  </script>
</body>
</html>

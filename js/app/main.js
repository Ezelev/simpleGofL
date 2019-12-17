const MainJS = (function() {

      function _createField(){
          // clear table
          var tableEl = document.getElementById("table-field");
          tableEl.innerHTML = "";
          // setting table dimensions
          var n =   document.getElementById("size-n").value;
          var m =   document.getElementById("size-m").value;
          // creating table
          var tableEl = document.getElementById("table-field");
          for(var i = 0; i < n; i++) {
              var tdEl = document.createElement('tr');
              tableEl.appendChild(tdEl);
              for(var j = 0; j < m; j++){
                var trEl = document.createElement('td');
                trEl.id = "" + i + "-" + j;
                tdEl.appendChild(trEl);
              }
          }

      }

      function _startEvolve() {
        //console.log("form submitted!");
        // _createField();
        _getEvolutionHistory();
      }

      function _startEvolveAjax(){
        _createField();
        _getEvolutionHistoryAjax();
      }

      function _getEvolutionHistoryAjax() {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        }
        var step = 0;
        var nSize = document.getElementById("size-n").value;
        var mSize = document.getElementById("size-m").value;
        var cyclesCount = document.getElementById("cycles-count").value;
        var patternSelectEl = document.getElementById("pattern-select");
        var selectedOption = patternSelectEl.options[patternSelectEl.selectedIndex].value;

        var url = "test.php?pattern=" + selectedOption + "&nSize=" + nSize + "&mSize=" + mSize + "&cyclesCount=" + cyclesCount;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true); // async=true
        xhr.onload = function (e) {
            if (xhr.readyState == 4 && xhr.status == 200) {
              var response = JSON.parse(xhr.response);
              console.log(response);
              return false;
              if(response.status == "1"){
                console.log("success");
                var field;
                for(var i = 0; i < response.body.length; i++){
                  (function(i){
                    setTimeout(function(){
                        _parseEvolutionStep(response.body[i]);
                    }, 250 * (i + 1));
                  })(i);
                }
              } else {
                alert(response.message);
              }
            }
        };
        xhr.send(null);
      }

      function _getEvolutionHistory() {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        }

        var nSize = document.getElementById("size-n").value;
        var mSize = document.getElementById("size-m").value;
        var cyclesCount = document.getElementById("cycles-count").value;
        var patternSelectEl = document.getElementById("pattern-select");
        var selectedOption = patternSelectEl.options[patternSelectEl.selectedIndex].value;

        var url = "test.php?pattern=" + selectedOption + "&nSize=" + nSize + "&mSize=" + mSize + "&cyclesCount=" + cyclesCount;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", url, true); // async=true
        xhr.onload = function (e) {
            if (xhr.readyState == 4 && xhr.status == 200) {
              var response = JSON.parse(xhr.response);
              console.log(response);
              //return false;
              if(response.status == "1"){
                console.log("success");
                var field;
                for(var i = 0; i < response.body.length; i++){
                  _parseEvolutionStep(response.body[i]);
                  (function(i){
                    setTimeout(function(){
                        _parseEvolutionStep(response.body[i]);
                    }, 100 * (i + 1));
                  })(i);
                }
              } else {
                alert(response.message);
              }
            }
        };
        xhr.send(null);
      }

      function _parseEvolutionStep(fieldArr){
        var canvas = document.getElementById('canvas');
        var x;
        var y;
        for(var i = 0; i < fieldArr.length; i++) {
          for(var j = 0; j < fieldArr[i].length; j++) {
            var x = (i * 10);
            var y = (j * 10);
            _colorCell(canvas, x, y, "white");
            if(fieldArr[i][j] == 1) {
                _colorCell(canvas, x, y);
            }
          }
        }
      }

      function _colorCell(canvas, x,y, color) {
        if (canvas.getContext) {
          var context = canvas.getContext('2d');
          if(color == "white"){
             context.fillStyle = "#ffffff";
            context.fillRect(x+2, y+2, 8, 8);
          } else {
             context.fillStyle = "#000000";
            context.fillRect(x+2, y+2, 8, 8);
          }


        }
      }

  const init = () => {
    document.getElementById("evolve-btn").addEventListener("click", _startEvolve);
    document.getElementById("evolve-btn-ajax").addEventListener("click", _startEvolveAjax);
  }

  return {
    init,
  }
})();

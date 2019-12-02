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
        _createField();
        _getEvolutionHistory();
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
        // xmlhttp.open("GET", url, false);
        // xmlhttp.send(null);
        // var response = JSON.parse(xmlhttp.response);
        // console.log(response);
        // if(response.status == "1"){
        //   console.log("success");
        //   var field;
        //   for(var i = 0; i < response.body.length; i++){
        //     (function(i){
        //       setTimeout(function(){
        //           _parseEvolutionStep(response.body[i]);
        //       }, 250 * (i + 1));
        //     })(i);
        //   }
        // } else {
        //   alert(response.message);
        // }
      }

      function _parseEvolutionStep(fieldArr){
        console.log(123123);
        var cell;
        for(var i = 0; i < fieldArr.length; i++) {
          for(var j = 0; j < fieldArr[i].length; j++) {
            // console.log(fieldArr[i][j]);
            cell = document.getElementById("" + i + "-" + j);
            cell.innerHTML = fieldArr[i][j];
            cell.classList.remove("active");
            if(fieldArr[i][j] == 1) {
              cell.classList.add("active");
            }
          }
        }
      }

  const init = () => {
    document.getElementById("evolve-btn").addEventListener("click", _startEvolve);
  }

  return {
    init,
  }
})();

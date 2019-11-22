const MainJS = (function() {

  const init = () => {
    document.addEventListener("DOMContentLoaded", function(event) {
    //  document.getElementById("btn-create-field").addEventListener("click", createField);
    document.getElementById("evolve-btn").addEventListener("click", startEvolve);


      function createField(){
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

      function startEvolve() {
        //console.log("form submitted!");
        createField();
        getEvolutionHistory();
      }

      function getEvolutionHistory() {
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        }

        var nSize = document.getElementById("size-n").value;
        var mSize = document.getElementById("size-m").value;
        var patternSelectEl = document.getElementById("pattern-select");
        var selectedOption = patternSelectEl.options[patternSelectEl.selectedIndex].value;

        var url = "test.php?pattern=" + selectedOption + "&nSize=" + nSize + "&mSize=" + mSize;
        xmlhttp.open("GET", url, false);
        xmlhttp.send(null);
        var response = JSON.parse(xmlhttp.response);
        if(response.status == "1"){
          var field;
          for(var i = 0; i < response.body.length; i++){
            (function(i){
              setTimeout(function(){
                  parseEvolutionStep(response.body[i]);
              }, 250 * (i + 1));
            })(i);
          }
        } else {
          alert(response.message);
        }
      }

      function parseEvolutionStep(fieldArr){
        var cell;
        for(var i = 0; i < fieldArr.length; i++) {
          for(var j = 0; j < fieldArr[i].length; j++) {
            console.log(fieldArr[i][j]);
            cell = document.getElementById("" + i + "-" + j);
            cell.innerHTML = fieldArr[i][j];
            cell.classList.remove("active");
            if(fieldArr[i][j] == 1) {
              cell.classList.add("active");
            }
          }
        }
      }

    });
  };

  return {
    init,
  }
})();

document.addEventListener("DOMContentLoaded", function(event) {


  document.getElementById("btn-create-field").addEventListener("click", createField);
  document.getElementById("evolve-btn").addEventListener("click", startEvolve);


  function createField(){
      console.log(123);
      var n =   document.getElementById("size-n").value;
      var m =   document.getElementById("size-m").value;
      console.log("Start createing field with size: " + n + " to " + m );
      var tableEl = document.getElementById("table-field");
      for(var i = 0; i < n; i++) {
          var tdEl = document.createElement('tr');
          tableEl.appendChild(tdEl);
          for(var j = 0; j < m; j++){
            var trEl = document.createElement('td');
            trEl.id = "" + i + j;
            tdEl.appendChild(trEl);
          }
      }

  }

  function startEvolve() {
    console.log("form submitted!");
    getEvolutionHistory();
  }

  function getEvolutionHistory() {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    var url = "test.php";
    xmlhttp.open("GET", url, false);
    xmlhttp.send(null);
    var response = JSON.parse(xmlhttp.response);
    var field;
    for(var i = 0; i < response.length; i++){
      (function(i){
        setTimeout(function(){
            parseEvolutionStep(response[i]);
        }, 1000 * (i + 1));
      })(i);
    }

  }

  function parseEvolutionStep(fieldArr){
    var cell;
    for(var i = 0; i < fieldArr.length; i++) {
      for(var j = 0; j < fieldArr[i].length; j++) {
        console.log(fieldArr[i][j]);
        cell = document.getElementById("" + i + j);
        cell.innerHTML = fieldArr[i][j];
        cell.classList.remove("active");
        if(fieldArr[i][j] == 1) {
          cell.classList.add("active");
        }

      }
    }
  }

});

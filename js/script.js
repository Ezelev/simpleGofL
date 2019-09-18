document.addEventListener("DOMContentLoaded", function(event) {

  document.getElementById("evolve-btn").addEventListener("click", startEvolve);

  function startEvolve() {
    console.log("form submitted!");


    getEvolutionHistory();


  }

  function getEvolutionHistory() {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    var url = "index.php";
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

document.addEventListener("DOMContentLoaded", function(event) {

  document.getElementById("evolve-btn").addEventListener("click", startEvolve);

  function startEvolve() {
    console.log("form submitted!");


    loadXMLDoc();


  }

  function loadXMLDoc() {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    var url = "index.php";
    xmlhttp.open("GET", url, false);
    xmlhttp.send(null);
    document.getElementById("test").innerHTML = xmlhttp.response -
      Text;
  }

  alert("asd");

});

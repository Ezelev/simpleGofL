const Test = (function() {

  const testLoad = () => {
    alert(123);
    document.addEventListener("DOMContentLoaded", function(event) {
        alert("page loaded!!!");
    });
  };



  return {
    testLoad,
  }
})();

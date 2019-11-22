const Test = (function() {

  const testLoad = () => {
    alert(123);
  };

  const DomManipulate = function(){

   document.addEventListener("DOMContentLoaded",()=>{

      this.element = document.querySelector("body");
      console.log(this.element);

   });

};

  return {
    testLoad,
    DomManipulate,
  }
})();

requirejs.config({
    baseUrl: 'js/lib',
    paths: {
        app: '../app'
    }
});
// Start the main app logic.
requirejs(['app/test','app/main'],
function  (test, main) {
  //  Test.testLoad();
    Test.DomManipulate();
    MainJS.init();
});

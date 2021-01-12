/**
 * Created by elporfirio on 24/05/17.
 */
$(document).ready(function(){
 //document.getElementById("loading-screen").style.display = "none";
var screen = $('#loading-screen');

            screen.fadeIn();
      
        
            screen.fadeOut(1600, function() {
    document.getElementById("cont").style.display = "block";
  });
        
        //document.getElementById("cont").style.display = "block";
    //var screen = $('#loading-screen');
    
    //configureLoadingScreen(screen);

    //window.location = "index";
});

function configureLoadingScreen(screen){
    $(document)
        // .ajaxStart(function () {
        //     screen.fadeIn();
        // })
        // .ajaxStop(function () {
        //     screen.fadeOut();
        // });
alert(screen);
        document.getElementById(screen).style.display = "none";
}
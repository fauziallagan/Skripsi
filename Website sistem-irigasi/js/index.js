window.setTimeout(function() {
    $(".alert-notif").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);

window.setTimeout(function(){
    $(".alert-redirect").fadeTo(500,0).slideUp(500, function(){
        window.location.replace("login.php");
    });
}, 2000);
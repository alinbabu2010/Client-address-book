<?php
    session_start();
    $_SESSION['title']= "Log Out";
    include('includes/header.php');
    // clear all session varibles
    session_unset();
    // destroy the session
    session_destroy();
    echo "<div class='text-center' id='text-logout' > You've been logged out! See you next time. <br> Redirecting to home page in <span id='counter'>10</span> seconds</div> ";
    echo "<script type='text/javascript'>
              function countdown() {
                var i = document.getElementById('counter');
                if (parseInt(i.innerHTML)<=1) {
                    location.href = 'index.php';
                }
                i.innerHTML = parseInt(i.innerHTML)-1;
              }
              setInterval(function(){ countdown(); },1000);
</script>";
    include('includes/footer.php');
?>

<?php
    session_start();
    $_SESSION['title']= "Log Out";
    include('includes/header.php');
    // clear all session varibles
    session_unset();
    // destroy the session
    session_destroy();
    echo "<div class='text-center'> You've been logged out! See you next time. </div> ";
?>
<br>
<div class="text-center">
    <a role="submit" class="btn btn-primary" href="index.php">Log In</a>
</div>
<?php
    include('includes/footer.php');
?>
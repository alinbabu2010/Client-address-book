9<?php 
    session_start();
    $_SESSION['title']= "Delete";
    $id=$_SESSION['uid'];
    include('includes/header.php'); 
    include('includes/connection.php');
    include('includes/functions.php');
    if(isset($_POST['delete'])){  
        $sql = "delete from users where id='$id'";
        $result = mysqli_query( $conn,$sql );
        if( $result ) {
            session_unset();
            // destroy the session
            session_destroy();
            echo "<div class='text-center' id='text-logout' > Sucessfukky deleted user.<br>Redirecting to home page in <span id='counter'>9</span> seconds</div> ";
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
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>Delete unsucessfull".mysqli_error($conn)."</div>";
        }
    }
    if (isset($_POST['none'])) {
        header("Location:clients.php");
    }
mysqli_close($conn);
?>
<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post" id="form-style">
<div class="text-center">
    <h3 class="text-center">Do you want to delete account ?</h3>
    <button type="submit" class="btn btn-danger btn-lg" name="delete" id="nav-button">Yes</button>
    <button type="submit" class="btn btn-sucess btn-lg" name="none">No</button>
</div>
</form>
<?php
    include('includes/footer.php');
?>
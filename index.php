<?php 
    session_start();
    $_SESSION['title']= "Login";
    $_SESSION['loggedInUser']= NULL;
    include('includes/header.php'); 
    include('includes/functions.php');
    include('includes/connection.php');
    if( isset($_POST['login'])){
        $email = validateFormData($_POST['email']);
        $query = "select * from users where email='$email'";
        $result = mysqli_query($conn,$query);
        if( mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    if( password_verify ( $_POST['password'], $row["password"])) {
                        $_SESSION['loggedInUser'] = $row["name"];
                        $_SESSION['uid'] = $row["id"]; 
                        header('Location:clients.php');
                    }
                    else{
                        echo "<div class='alert alert-danger' role='alert'>Incorrect Password<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button></div>";
                    }
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>Please check your email and password<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button></div>";
        }
        
    }
    mysqli_close($conn);
?>
<div class="container" style="padding:20px;">
    <h1>Client Address Book</h1>
    <p class="lead">Log in to your account</p>
    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary" name="login">Log In</button>
        </div>
    </form>
</div>
<?php
    include('includes/footer.php');
?>
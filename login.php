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
                        $_SESSION['loggedInUser'] = $row["first_name"];
                        $_SESSION['uid'] = $row["id"];
                        header('Location:clients.php');
                    }
                    else{
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Incorrect Password<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button></div>";
                    }
        }
        else{
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Please check your email and password<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button></div>";
        }

    }
    if( isset($_POST['signup'])){
        header("Location:register.php");
    }
    if (isset($_GET['alert'])) {
        if ($_GET['alert']=='regSucess') {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Sucessfully registred user.Now you can login<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button> </div>";
        }
    }
    mysqli_close($conn);
?>
    <h1 class="text-center" id="heading">Client Address Book</h1>
    <form id="form-style" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
      <p class="lead col-auto">Log in to your account</p>
        <div class="form-group col-auto">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-auto">
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

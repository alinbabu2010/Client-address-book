<?php
    session_start();
    $_SESSION['title']= "Sign Up";
    $_SESSION['loggedInUser']= null;
    include('includes/header.php');
    include('includes/functions.php');
    include('includes/connection.php');
    if (isset($_POST['register'])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = validateFormData($_POST["email"]);
        if ($_POST["password"]==$_POST["repassword"]) {
            $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
            $query = "insert into users(first_name,last_name,email,password) values('$fname','$lname','$email','$password')";
             if (mysqli_query($conn, $query)) {
                header("Location:login.php?alert=regSucess");
            }
            else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Not Inserted <br>". mysqli_error($conn)."</div>";
            }
        }
        else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Password not matching.<br>". mysqli_error($conn)."</div>";
        }

    }
    mysqli_close($conn);
?>
    <h1 class="text-center" id="heading">User Registration</h1>
    <form id="form-style" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p class="lead col-auto">Create your user account</p>
        <div class="form-group col-auto">
            <input type="text" class="form-control" id="validationCustom01" name="fname" placeholder="First name"
                required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group col-auto">
            <input type="text" class="form-control" id="validationCustom02" name="lname" placeholder="Last name"
                required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group col-auto">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email" name="email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-auto">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                name="password" required id="pass1">
        </div>
        <div class="form-group col-auto">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-type password"
                name="repassword" required id="pass2">
        </div>
        <div class="form-group col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <div class="text-center">
            <button class="btn  btn-primary" type="submit" name="register">Register User</button>
        </div>
    </form>
</div>
<?php
    include('includes/footer.php');
?>

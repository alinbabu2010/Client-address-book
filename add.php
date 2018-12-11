<?php 
    session_start();
    $_SESSION['title']= "Add";
    $uid=$_SESSION['uid'];
    include('includes/header.php'); 
    include('includes/connection.php');
    include('includes/functions.php');
    if(isset($_POST['add'])){
        $name = $_POST["name"];
        $email = validateFormData($_POST["email"]);
        $phone = validateFormData($_POST["phone"]);
        $address = validateFormData($_POST["address"]);
        $company = validateFormData($_POST["company"]);
        $notes = validateFormData($_POST["notes"]);
        $query = "insert into client(uid,name,email,phone,address,company,notes) values('$uid','$name','$email','$phone','$address','$company','$notes')";
            if( mysqli_query($conn,$query) ) {
                header("Location:clients.php?alert=addSucess");
            }else{
                echo "<div class='alert alert-danger' role='alert'>Not Inserted <br>". mysqli_error($conn)."</div>";
            }
            mysqli_close($conn);
    }
?>
<form  action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="row">
    <div class="col mb-3">
      <label for="validationCustom01">Name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Enter your full name" name="name" required>
    </div>
    <div class="col mb-3">
      <label for="validationCustom02">Email</label>
      <input type="email" class="form-control" id="validationCustom02" placeholder="Enter your email id" name="email" required>
    </div>
</div>
  <div class="row">
      <div class="col mb-3">
      <label for="validationCustomUsername">Phone</label>
        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Enter phone number" aria-describedby="inputGroupPrepend" name="phone" required>
      </div>
    <div class="col mb-3">
      <label for="validationCustom03">Address</label>
        <textarea class="form-control" id="validationCustom03" name="address" required></textarea>
    </div>
    </div>
    <div class="row">
    <div class="col mb-3">
      <label for="validationCustom04">Company</label>
      <input type="text" class="form-control" id="validationCustom04" placeholder="Enter company details" name="company">
    </div>
    <div class="col mb-3">
      <label for="validationCustom05">Notes</label>
        <textarea class="form-control" id="validationCustom03" name="notes"></textarea>
    </div>
  </div>
  <div class="text-center">
    <button class="btn btn-primary" type="submit" name="add">Add</button>
  </div>
</form>
<?php
    include('includes/footer.php');
?>
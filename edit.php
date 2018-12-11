<?php 
    $cid =  $_GET['id'];
    session_start();
    $_SESSION['title']= "Edit";
    include('includes/header.php'); 
    include('includes/connection.php');
    include('includes/functions.php');
    $query = "select * from client where cid='$cid'";
    $result = mysqli_query($conn,$query);
    if( mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result); 
            $_SESSION['cid']=$row["cid"];
            $name=$row["name"];
            $email=$row["email"];
            $phone=$row["phone"];
            $address=$row["address"];
            $company=$row["company"]; 
            $notes=$row["notes"]; 
    }
    if(isset($_POST['update'])){
        $id=$_SESSION['cid'];
        $name1=$_POST["name"];
        $email1 = validateFormData($_POST["email"]);
        $phone1 = validateFormData($_POST["phone"]);
        $address1 = validateFormData($_POST["address"]);
        $company1 = validateFormData($_POST["company"]);
        $notes1 = validateFormData($_POST["notes"]);
        $sql = "UPDATE client SET name='$name1', email='$email1', phone=$phone1, address='$address1', company='$company1', notes='$notes1' WHERE cid='$id' ";
        $result = mysqli_query( $conn,$sql );
        if( $result ) {
            header("Location:clients.php?alert=updateSucess");
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>Update unsucessfull".mysqli_error($conn)."</div>";
        }
        
    }
    if(isset($_POST['delete'])){  
            $id=$_SESSION['cid'];
            $sql = "delete from client where cid='$id' ";
            $result = mysqli_query( $conn,$sql );
            if( $result ) {
                header("Location:clients.php?alert=deleteSucess");
            }
            else{
                echo "<div class='alert alert-danger' role='alert'>Delete unsucessfull".mysqli_error($conn)."</div>";
            }
    }
    mysqli_close($conn);
?>

<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="text-center font-weight-bold bg-secondary text-white"> Client ID : <?php echo $_SESSION['cid']; ?></div>
      <div class="row">
        <div class="col mb-3">
          <label for="validationCustom01">Name</label>
          <input type="text" class="form-control" id="validationCustom01" placeholder="Enter your full name" name="name" required value="<?php echo $name; ?>">
        </div>
        <div class="col mb-3">
          <label for="validationCustom02">Email</label>
          <input type="email" class="form-control" id="validationCustom02" placeholder="Enter your email id" name="email" required value="<?php echo $email; ?>">
        </div>
     </div>
    <div class="row">
        <div class="col mb-3">
            <label for="validationCustomUsername">Phone</label>
            <input type="text" class="form-control" id="validationCustomUsername" placeholder="Enter phone number" aria-describedby="inputGroupPrepend" name="phone" required value="<?php echo $phone; ?>">
        </div>
        <div class="col mb-3">
            <label for="validationCustom03">Address</label>
            <textarea class="form-control" id="validationCustom03" name="address" required ><?php echo $address; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="validationCustom04">Company</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="Enter company details" name="company" value="<?php echo $company; ?>">
        </div>
        <div class="col mb-3">
            <label for="validationCustom05">Notes</label>
            <textarea class="form-control" id="validationCustom03" name="notes"><?php echo $notes; ?></textarea>
        </div>
  </div>
  <div class="text-center">
    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Delete</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Do you really want to delete this client ?
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="delete">Yes</button>
                <button type="button" name="delete" class="btn btn-secondary" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
    <button class="btn btn-success" type="submit" name="update">Update</button>
  </div>
</form>

<?php
    include('includes/footer.php');
?>
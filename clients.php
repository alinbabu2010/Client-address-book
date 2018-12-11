<?php
    session_start();
    $_SESSION['title']= "Client";
    include('includes/header.php');
    if(isset($_GET['alert'])){
        if($_GET['alert']=='updateSucess'){
            echo "<div class='alert alert-success' role='alert'>Sucessfully updated client details<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button> </div>";
        } 
        if($_GET['alert']=='deleteSucess'){
            echo "<div class='alert alert-success' role='alert'>Client deleted.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button> </div>";
        }
        if($_GET['alert']=='addSucess'){
            echo "<div class='alert alert-success' role='alert'>Client added sucessfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true''>&times;</span></button> </div>";
        }
    }
    if(isset($_POST['edit'])){
        header('Location:edit.php');
    }
?>
<h1>Client Address Book</h1>
<div class="table-responsive">
<table class='table table-bordered'>
    <thead class='thead-dark'>
        <tr class='text-center'>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Phone</th>
            <th scope='col'>Address</th>
            <th scope='col'>Company</th>
            <th scope='col'>Notes</th>
            <th scope='col'>Edit</th>
        </tr>
    </thead>
<?php
    include('includes/connection.php'); 
    $uid = $_SESSION['uid'];
    $query = "select * from client where uid='$uid'";
    $result = mysqli_query($conn,$query);
    if( mysqli_num_rows($result) > 0){
        while( $row = mysqli_fetch_assoc($result) ){
            $id = $row["cid"];
            echo "<tbody>
                <tr>
                <td>".$row["name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["company"]."</td>
                <td>".$row["notes"]."</td>
                <td><a href='edit.php?id=$id' role='button' class='btn btn-success'><img src='img/314724-24.png'></a></td>
                </tr>
                </tbody>";
        }
    } else {
        echo "<div class='alert alert-warning' role='alert'>You have no clients! </div>";  
    }
    mysqli_close($conn);
?>
    </table>
    </div>
    <div class='text-center'><a role="button" class="btn btn-success" href="add.php"><img src="img/211872-16.png"> Add Client</a></div>
<?php 
   include('includes/footer.php');  
?>
    
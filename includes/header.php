<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css\stylesheet.css">

  <!-- Custom styles -->
  <link rel="icon" href="img\icons8-address-book-2-filled-50.png" type="image/icon type">

  <!-- Custom fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
    type="text/css">

  <title><?php echo $_SESSION['title']; ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.php">CLIENT<b>MANAGER</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
            if ($_SESSION['loggedInUser']) {
                ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="clients.php">My Clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Add Client</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="dropdown">
          <a class="btn btn-outline-warning btn-sm dropdown-toggle" id="nav-button" data-toggle="dropdown">Hi <?php echo $_SESSION['loggedInUser']; ?></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href=" ">My Clients</a>
            <a class="dropdown-item" href="delete.php">Delete Account</a>
          </div>
        </div>
          </div>
        </div>
        <a class="btn btn-outline-danger btn-sm" href="logout.php">Logout</a>
      </ul>
    </div>
  </nav>
  <div class="container" id="main-body">
    <?php
            } else {
                ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav text-right">
        <li clas="nav-item">
          <a class="btn btn-outline-primary  btn-sm" href="register.php">Sign Up</a>
        </li>
      </ul>
    </div>
    </nav>
    <div class="container">
      <?php
            } ?>
<?php
    include "./includes/validate_customer.php";
    include "./includes/session_timeout.php";
    require './API/config/db.config.php';

    // Creata a connection to the database
    $conn = new Connection();
  
    $id = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";
    $result1 = $conn->conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    
    $sql2  = "SELECT * FROM transaction".$id."";
    $result2 = $conn->conn->query($sql2); 

?>
<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="icon.png" />
    <!-- Place favicon.ico in the root directory -->

    <!-- NVD3 -->
    <!-- Morris.js Charts Plugin -->
    <!-- <link href="https://firstprofittrading.biz/assets\plugins\morris\morris.css" rel="stylesheet" /> -->
    <!-- <link href="css/nvd3.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nvd3/1.8.6/nv.d3.css"> -->

    <!-- Material Icon -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- Fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/main.css" />
    <meta name="theme-color" content="#fafafa" />
  </head>

  <body>
    
    <main>
      <header class="dashHeader">
        <nav class="container">
          <ul>
            <li>
              <a href="#">
                <div>
                  <h5><?php echo $row0['first_name'].' '.$row0['last_name'] ?></h5>
                  <small>Last logged yesterday at 8:45am</small>
                </div>
              </a>
            </li>
            <li><a href="dashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="profile.php"><i class="fas fa-user-tie mr-2"></i> Your profile</a></li>
            <li><a href="help.php"><i class="fas fa-phone mr-2"></i> Help desk</a></li>
            <li><a href="message.php"><i class="fas fa-envelope mr-2"></i> Inbox</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt mr-2"></i> Log off</a></li>
          </ul>
        </nav>

      </header>
      <div class="mobileFooter">
        <a href="dashboard.php"><i class="fas fa-home"></i> <p>Home</p></a>
        <a href="profile.php"><i class="fas fa-user-tie mr-2"></i> <p>Your profile</p></a>
        <a href="help.php"><i class="fas fa-phone mr-2"></i> <p>Help desk</p></a>
        <a href="message.php"><i class="fas fa-envelope mr-2"></i> <p>Inbox</p></a>
        <a href="#"><i class="fas fa-sign-out-alt mr-2"></i> <p>Log off</p></a>
      </div>
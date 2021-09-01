<?php
require '../API/config/db.config.php';
// Creata a connection to the database
$conn = new Connection();

$sql0 = "SELECT * FROM customer";
$result0 = $conn->conn->query($sql0);

$sqlm = "SELECT * FROM mail";
$resultm = $conn->conn->query($sqlm);

function getOneUser($id, $conn)
{
    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id."";
    $res = $conn->conn->query($sql0);
    return $res->fetch_assoc();
}

function getAmount($id, $conn)
{
    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
        SELECT MAX(trans_id) FROM passbook".$id.")";
    $result1 = $conn->conn->query($sql1);
    return $result1->fetch_assoc();
}
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
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/nice-select.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <meta name="theme-color" content="#fafafa" />
  </head>

  <body>
    
    <header class="adminHeader">
      <nav class="container">
        <a href="index.php"><i class="fas fa-sign-out-alt"></i> Home</a>
        <a href="message.php"><i class="fas fa-envelope"></i> Messages</a>
      </nav>

    </header>
    <div class="mobileFooter">
      <a href="index.php"><i class="fas fa-home"></i> <p>Home</p></a>
      <a href="message.php"><i class="fas fa-envelope"></i> <p>Message</p></a>
    </div>
    
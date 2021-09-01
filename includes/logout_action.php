<?php
    session_start();
    session_destroy();

    if (isset($_GET['sessionExpired'])) {
        header("location:../login.php");
    }
    else {
        header("location:../index.php");        
    }
?>

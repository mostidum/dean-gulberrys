<?php
    //If NOT logged in --> send to login page
    if (!isset($_SESSION["uid"])){
        header("location: ../login.php");
    }
?>
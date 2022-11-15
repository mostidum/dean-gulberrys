<?php
    //If user is already signed in, send thme to index.php
    if (isset($_SESSION["uid"])){
        if ($_SESSION["account-type"] === "student") {
            header("location: ../student-dashboard.php");
        }
        else {
            header("location: ../faculty-dashboard.php");
        }
    }

?>
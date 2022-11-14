<?php
    //If user is already signed in, send thme to index.php
    if (isset($_SESSION["uid"])){
        header("location: ../index.php");
    }

?>
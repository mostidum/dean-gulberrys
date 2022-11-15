<?php
    session_start();
    require_once "includes/dbh.php";

    if (isset($_POST["submit-semester"])){

        $semester = $_POST["semester"];
        $studentID = $_SESSION["uid"];

        header("location: view-schedule.php?semester=$semester");
        exit();
    }
?>
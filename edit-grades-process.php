<?php
    session_start();
    require_once "includes/dbh.php";

    if (isset($_POST["save"])){

        $grade = $_POST["grade"];
        $studentID = $_POST["student-id"];
        $courseID = $_POST["course_id"];
        
        $sql = "UPDATE `cs532`.`record` SET grade = '$grade' WHERE student_id = '$studentID' AND course_id = '$courseID'";


        $result = $conn->query($sql);

        header("location: ../edit-grades.php");
        exit();
    }
    else {
        header("location: ../edit-grades.php");
    }
?>
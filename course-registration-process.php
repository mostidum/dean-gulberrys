<?php
    session_start();
    require_once "includes/dbh.php";

    if (isset($_POST["sign-up"])){

        $courseID = $_POST["course-id"];
        $studentID = $_SESSION["uid"];
        
        $sql = "INSERT INTO record (student_id, course_id) VALUES ('$studentID', '$courseID')";
        $result = $conn->query($sql);

        header("location: student-dashboard.php");
        exit();
    }
?>
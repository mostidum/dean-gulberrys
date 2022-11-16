<?php
    session_start();
    require_once "includes/dbh.php";

    if(isset($_POST["removeClass"])) { 
            // trying to get course id from the course table
            $course_id = $_POST["course-id"];
            $student_id = $_SESSION["uid"];
            //$sql = "DELETE FROM record WHERE course_id = $course_id and student_id = $student_id;";
            $result = $conn->query("DELETE FROM record WHERE course_id = '$course_id' AND student_id = '$student_id';");
            //$result = mysqli_query($conn, $sql);
            header("location: view-schedule.php");
            exit();
    }
    else {  
        header("location: student-dashboard.php");
        exit();
    }
?>
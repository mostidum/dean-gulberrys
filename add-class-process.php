<?php
require_once "includes/dbh.php";

if (isset($_POST["save_class"])) {
    $course = $_POST["course"];
    $instructor_ID = $_POST["faculty-id"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $days = $_POST["days"];
    $schedule_num = $_POST["schedule_num"];
    $location = $_POST["location"];
    $semester = $_POST["semester"];


    if (empty($course)) {
        header("location: ../add-class.php?error= Course is empty");
        exit();
    }
    //check if instructor ID is in database
    if (empty($instructor_ID)) {
        header("location: ../add-class.php?error= Faculty ID empty");
        exit();
    } else {
        $result = $conn->query("SELECT faculty_id FROM faculty WHERE faculty_id= '$instructor_ID'");
        if ($result->num_rows == 0) {
            header("location: ../add-class.php?error= Faculty ID not found");
            exit();
        }
    }
    if (empty($start_time)) {
        header("location: ../add-class.php?error= start time empty");
        exit();
    }
    if (empty($end_time)) {
        header("location: ../add-class.php?error=  end time empty");
        exit();
    } elseif ($end_time < $start_time) {
        header("location: ../add-class.php?error=  invalid start and end time");
        exit();
    }
    if (empty($location)) {
        header("location: ../add-class.php?error=  Course number empty");
        exit();
    }
    if (empty($days)) {
        header("location: ../add-class.php?error=  days empty");
        exit();
    }
    if (empty($semester)) {
        header("location: ../add-class.php?error=  Course number empty");
        exit();
    }
    if (empty($schedule_num)) {
        header("location: ../add-class.php?error=  Schedule number empty");
        exit();
    }


    $sql = "INSERT INTO class(days,time_start,time_end,
    location, schedule, semester,instructor_id, course_id) VALUES ('$days', '$start_time', '$end_time','$location','$schedule_num','$semester','$instructor_ID', '$course')";

    $result = $conn->query($sql);

    if ($result === true) {
        header("location: ../add-class.php?added = Successfully Added Course");
        exit();
    }

    header("location: ../add-class.php");
    exit();
} else {
    header("location: ../index.php");
    exit();
}

<?php
require_once "includes/dbh.php";

if (isset($_POST["submit"])){
    $courseID = $_POST["course-id"];
    $courseTitle = $_POST["course-title"];
    $courseDescription = $_POST["course-description"];
    $courseUnits = $_POST["units"];
    $courseDateTime = $_POST["date-time"];
    $courseScheduleNum = $_POST["schedule"];
    $courseDepartment = $_POST["department"];
    $courseLocation = $_POST["location"];
    $courseIsGraduate = $_POST["graduate"];
    $coursePrereqs = $_POST["prerequisites"];
    $courseInstructorID = $_POST["instructor-id"];

    if (empty($courseID)) {
        header("location: ../add-course.php?error= Course ID empty");
        exit();
    }
    if (empty($courseTitle)) {
        header("location: ../add-course.php?error= Course title empty");
        exit();
    }
    if (empty($courseDescription)) {
        header("location: ../add-course.php?error= Course desc empty");
        exit();
    }
    if (empty($courseUnits)) {
        header("location: ../add-course.php?error= Course units empty");
        exit();
    }
    if (empty($courseDateTime)) {
        header("location: ../add-course.php?error= Course datetime empty");
        exit();
    }
    if (empty($courseScheduleNum)) {
        header("location: ../add-course.php?error= Course schedule num empty");
        exit();
    }
    if (empty($courseDepartment)) {
        header("location: ../add-course.php?error= Course department empty");
        exit();
    }
    if (empty($courseLocation)) {
        header("location: ../add-course.php?error= Course location empty");
        exit();
    }
    if (empty($courseIsGraduate)) {
        header("location: ../add-course.php?error= Course is graduate empty");
        exit();
    }
    if (empty($coursePrereqs)) {
        header("location: ../add-course.php?error= Course prereqs empty");
        exit();
    }
    if (empty($courseInstructorID)) {
        header("location: ../add-course.php?error= Course prereqs empty");
        exit();
    }

    $sql = "INSERT INTO course 
                VALUES ('$courseID', '$courseTitle', '$courseDescription', '$courseUnits',
                        '$courseDateTime', '$courseScheduleNum', '$courseDepartment', '$courseLocation',
                        '$courseIsGraduate', '$coursePrereqs', '$courseInstructorID')";

    $result = $conn->query($sql);

    header("location: ../add-course.php");
    exit();
}
else {

}
?>
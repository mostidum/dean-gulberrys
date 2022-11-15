<?php
require_once "includes/dbh.php";

if (isset($_POST["submit"])){
    $courseTitle = $_POST["course-title"];
    $courseDescription = $_POST["course-description"];
    $courseUnits = $_POST["units"];
    $courseDepartment = $_POST["department"];
    $coursePrereqs = $_POST["prerequisites"];
    $courseIsGraduate = $_POST["graduate"];
    $courseNumber = $_POST["course-number"];
    $graduate;
    $abrv;

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
    if (empty($courseDepartment)) {
        header("location: ../add-course.php?error= Course department empty");
        exit();
    }
    if (empty($courseNumber)) {
        header("location: ../add-course.php?error= Course number empty");
        exit();
    }

    if(isset($_POST[$courseIsGraduate])) {
        $graduate = 1;
    }
    else {
        $graduate = 0;
    }

    $sql = "SELECT COUNT(*) FROM course WHERE course_title = '$courseTitle';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['COUNT(*)'] != 0) {
        header("location: ../add-course.php?error= Course Already Exists");
        exit();
    }
 
    $sql = "SELECT * FROM department WHERE department_name = '$courseDepartment';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $abrv = $row['department_abrv'] . " " . $courseNumber;

    $sql = "INSERT INTO course 
                VALUES ('$abrv', 
                '$courseTitle', 
                '$courseDescription',
                 '$courseUnits',
                        '$courseDepartment',
                        '$graduate',
                         '$coursePrereqs')";

    $result = $conn->query($sql);

    if($result === true) {

    }

    header("location: ../add-course.php");
    exit();
}
else {
    header("location: ../index.php");
    exit();
}
?>
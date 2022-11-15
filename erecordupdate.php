<?php

include 'includes/dbh.php';
    $id = $_POST['student_id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $major = $_POST['major'];
    $minor = $_POST['minor'];

    
    if (isset($_POST['graduate'])) {
        $graduate = 1;
    } else {
        $graduate = 0;
    }
    $notes = $_POST['notes'];
    $sql = "UPDATE `cs532`.`student` SET `name` = '$name', phone_number = '$phone_number',`address` = '$address',birthday = '$birthday',
    major = '$major',graduate = '$graduate', notes = '$notes' WHERE student_id = '$id'";
    $result = $conn->query($sql);
    header("location:electronic-student-record.php");
 ?>

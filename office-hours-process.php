<?php
    session_start();

    if(isset($_POST["saveOffice"])) {   //Makes sure the user hit the saveOffice button to get to this page
        $mondayStart = $_POST["monday-start"];
        $mondayEnd = $_POST["monday-end"];
        $tuesdayStart = $_POST["tuesday-start"];
        $tuesdayEnd = $_POST["tuesday-end"];
        $wednesdayStart = $_POST["wednesday-start"];
        $wednesdayEnd = $_POST["wednesday-end"];
        $thursdayStart = $_POST["thursday-start"];
        $thursdayEnd = $_POST["thursday-end"];
        $fridayStart = $_POST["friday-start"];
        $fridayEnd = $_POST["friday-end"];
        $officeLocation = $_POST["location"];
        $facId = $_SESSION['uid'];

        require_once "includes/dbh.php";
        require_once "includes/user-validation.php";

        $sql = "UPDATE office
                SET monday_start = '$mondayStart',
                    monday_end = '$mondayEnd',
                    tuesday_start = '$tuesdayStart',
                    tuesday_end = '$tuesdayEnd', 
                    wednesday_start = '$wednesdayStart',
                    wednesday_end = '$wednesdayEnd',
                    thursday_start = '$thursdayStart',
                    thursday_end = '$thursdayEnd',
                    friday_start = '$fridayStart',
                    friday_end = '$fridayEnd',
                    location = '$officeLocation'
                WHERE faculty_id = '$facId'
                ";
        $result = mysqli_query($conn, $sql);
        header("location: office-hours.php");
    }
    else {  //If the user did not click the register button to get here, send them back to the sign up page
        header("location: office-hours.php");
        exit();
    }
?>
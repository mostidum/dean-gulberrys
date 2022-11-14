<?php
    if(isset($_POST["submit"])) {   //Makes sure the user hit the register button to get to this page
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPass = $_POST["confirmPass"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $birthday = $_POST["birthday"];
        $major = $_POST["major"];
        $minor = $_POST["minor"];
        
        require_once "includes/dbh.php";
        require_once "includes/user-validation.php";

        //Checks to make sure that no input is empty
        if(empty($username) !== false){
            header("location: student-registration.php?error=emptyUsername");
            exit();
        }
        if(empty($password) !== false){
            header("location: student-registration.php?error=emptyPassword");
            exit();
        }
        if(empty($confirmPass) !== false){
            header("location: student-registration.php?error=emptyConfirmPassword");
            exit();
        }
        if(empty($name) !== false){
            header("location: student-registration.php?error=emptyName");
            exit();
        }
        if(empty($phone) !== false){
            header("location: student-registration.php?error=emptyPhone");
            exit();
        }
        if(empty($address) !== false){
            header("location: student-registration.php?error=emptyAddress");
            exit();
        }
        if(empty($birthday) !== false){
            header("location: student-registration.php?error=emptyBirthday");
            exit();
        }

        //Makes sure that the user inputs are valid
        if(validUsername($username) === false){
            header("location: student-registration.php?error=invalidUsername");
            exit();
        }
        if(validPassword($password) === false){
            header("location: student-registration.php?error=invalidPass");
            exit();
        }

        
        //Makes sure that the password and confirm password match
        if(checkMatch($password, $confirmPass) === false){
            header("location: student-registration.php?error=passwordMatch");
            exit();
        }

        //Checks if the username is not already taken in the database
        if(checkTakenUsername($conn, $username) === true){
            header("location: student-registration.php?error=takenUid");
            exit();
        }

        //Creates a new user in the database
        createUser($conn, $username, $password, $name, $phone, $address, $birthday);
    }
    else {  //If the user did not click the register button to get here, send them back to the sign up page
        header("location: student-registration.php");
        exit();
    }
?>
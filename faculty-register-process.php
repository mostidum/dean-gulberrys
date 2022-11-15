<?php
    if(isset($_POST["facultySubmit"])) {   //Makes sure the user hit the register button to get to this page
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPass = $_POST["confirmPass"];
        $name = $_POST["name"];
        $position = $_POST["position"];
        $phone = $_POST["phone"];
        $officeNumber = $_POST["officeNumber"];
        $department = $_POST["department"];
        
        require_once "includes/dbh.php";
        require_once "includes/user-validation.php";

        //Checks to make sure that no input is empty
        if(empty($username) !== false){
            header("location: faculty-registration.php?error=emptyUsername");
            exit();
        }
        if(empty($password) !== false){
            header("location: faculty-registration.php?error=emptyPassword");
            exit();
        }
        if(empty($confirmPass) !== false){
            header("location: faculty-registration.php?error=emptyConfirmPassword");
            exit();
        }
        if(empty($name) !== false){
            header("location: faculty-registration.php?error=emptyName");
            exit();
        }
        if(empty($position) !== false){
            header("location: faculty-registration.php?error=emptyPosition");
            exit();
        }
        if(empty($phone) !== false){
            header("location: faculty-registration.php?error=emptyPhone");
            exit();
        }
        if(empty($officeNumber) !== false){
            header("location: faculty-registration.php?error=emptyOfficeNumber");
            exit();
        }
        if(empty($department) !== false){
            header("location: faculty-registration.php?error=emptyDepartment");
            exit();
        }

        //Makes sure that the user inputs are valid
        if(validUsername($username) === false){
            header("location: faculty-registration.php?error=invalidUsername");
            exit();
        }
        if(validPassword($password) === false){
            header("location: faculty-registration.php?error=invalidPass");
            exit();
        }
        
        //Makes sure that the password and confirm password match
        if(checkMatch($password, $confirmPass) === false){
            header("location: faculty-registration.php?error=passwordMatch");
            exit();
        }

        //Checks if the username is not already taken in the database
        if(checkTakenUsername($conn, $username) === true){
            header("location: faculty-registration.php?error=takenUsername");
            exit();
        }

        //Creates a new user in the database
        $newUser = createFaculty($conn, $username, $password, $name, $position, $phone, $officeNumber, $department);
    
        if($newUser === true) {
            header("location: login.php");
            exit();
        }
        else {
            header("location: faculty-registration.php?error=couldNotCreateAccount");
        }
    }
    else {  //If the user did not click the register button to get here, send them back to the sign up page
        header("location: faculty-registration.php");
        exit();
    }
?>
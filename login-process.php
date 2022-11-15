<?php
require_once "includes/dbh.php";

echo "Inside login-process.php <br>";
if (isset($_POST["submit"])){

    echo "Submit button was clicked <br>";
    $uid = $_POST["uid"];
    $pwd = $_POST["password"];

    if (empty($uid) || empty($pwd)){
        header("location: ../login.php?error= All fields are required");
        exit();
    }

    $sql = "SELECT * FROM user WHERE username = '$uid'";

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($pwd, $user['password'])){
            session_start();

            //Check if user is a student or faculty
            if (!is_null($user['student_id'])){   
                $accountType = "student";
                $_SESSION["uid"] = $user['student_id'];
            }
            else {
                $accountType = "faculty";
                $_SESSION["uid"] = $user['faculty_id'];
            }
            $_SESSION["account-type"] = $accountType;

            if ($accountType == "student"){
                header("location: ../student-dashboard.php");
                exit();
            }
            else {
                header("location: ../faculty-dashboard.php");
                exit();
            }
            
        }
        else {
            header("location: ../login.php?error=Incorrect password");
            exit();
        }
    }
    else {
        header("location: ../login.php?error=No account found");
        exit();
    }

}
else{
    echo "How'd you get here?";
}
?>
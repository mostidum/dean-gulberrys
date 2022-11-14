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

    if (empty($_POST["account-type"])){
        header("location: ../login.php?error= Account Type Required");
        exit();
    }

    if ($_POST["account-type"]){   
        $accountType = "student";
    }
    else {
        $accountType = "faculty";
    }

    $sql = "SELECT * FROM user WHERE username = '$uid'";

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($pwd, $user['password'])){
            session_start();
            $_SESSION["uid"] = $uid;
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
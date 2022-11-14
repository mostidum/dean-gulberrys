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
        $sql = "SELECT * FROM user WHERE student_id = '$uid' AND `password` = '$pwd'";
        $accountType = "student";
    }
    else {
        $sql = "SELECT * FROM user WHERE faculty_id = '$uid' AND `password` = '$pwd'";
        $accountType = "faculty";
    }

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if ($pwd == $user['password']){
            session_start();
            $_SESSION["uid"] = $uid;
            $_SESSION["account-type"] = $accountType;
            header("location: ../index.php");
            exit();
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
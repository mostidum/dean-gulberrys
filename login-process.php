<?php
require_once "includes/dbh.php";

echo "Inside login-process.php <br>";
if (isset($_POST["submit"])){

    echo "Submit button was clicked <br>";
    $uid = $_POST["uid"];
    $pwd = $_POST["password"];

    if (empty($uid) || empty($pwd)){
        echo "Something was empty";
        header("location: ../login.php?error= All fields are required");
        exit();
    }

    $rawsql = "SELECT * FROM user WHERE student_id = '$uid' AND `password` = '$pwd'";

    $sql = sprintf($rawsql, $uid);
    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    var_dump($user);
    if ($user) {
        if ($pwd == $user['password']){
            session_start();
            $_SESSION["uid"] = $uid;
            header("location: ../index.php");
            exit();
        }
        else {
            header("location: ../login.php?error=Incorrect password");
        }
    }
    else {
        header("location: ../login.php?error=No account found");
    }

}
else{
    echo "How'd you get here?";
}
?>
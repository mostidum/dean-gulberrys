<?php
    function validUsername($username) {
        if(strlen($username) >= 6) {
            return preg_match("/^[a-zA-Z0-9]*$/", $username);
        }
        return false;
    }

    function validPassword($password) {
        if(strlen($password) >= 6) {
            return preg_match("/^[a-zA-Z0-9]*$/", $password);
        }
        return false;
    }

    function checkMatch($val1, $val2) {
        return $val1 == $val2;
    }

    function checkTakenUsername($conn, $username) {
        $sql = "SELECT COUNT(*) FROM user WHERE username = '$username';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['COUNT(*)'] == 0) {
            return false;
        }
        return true;
    }
    
    function createUser($conn, $username, $password, $name, $phone, $address, $birthday) {
        $sql = "INSERT INTO user (username, password, faculty_id) VALUES($username, $password, NULL)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../student-registration.php?error=stmtfailed");
            exit();
        }
    }
?>
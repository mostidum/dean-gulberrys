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
    
    function createStudent($conn, $username, $password, $name, $phone, $address, $birthday, $major, $minor) {
        $sqlStudent = "INSERT INTO student (name, phone_number, address, birthday, major, minor) VALUES('$name', '$phone', '$address', '$birthday', '$major', '$minor')";
        $resultStudent = mysqli_query($conn, $sqlStudent);
        
        if($resultStudent === false) {
            exit();
        }

        $lastId = $conn->insert_id;

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sqlUser = "INSERT INTO user (username, password, student_id, faculty_id) VALUES('$username', '$hash', '$lastId', NULL)";
        return mysqli_query($conn, $sqlUser);
    }

    function createFaculty($conn, $username, $password, $name, $position, $phone, $officeNumber, $officeHours, $department) {
        $sqlFaculty = "INSERT INTO faculty (name, position, phone_number, office_number, office_hours, department) VALUES('$name', '$position', '$phone', '$officeNumber', '$officeHours', '$department')";
        $resultFaculty = mysqli_query($conn, $sqlFaculty);
        echo "<script>console.log('Here');</script>";
        if($resultFaculty === false) {
            exit();
        }

        $lastId = $conn->insert_id;

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sqlUser = "INSERT INTO user (username, password, student_id, faculty_id) VALUES('$username', '$hash', NULL, '$lastId')";
        return mysqli_query($conn, $sqlUser);
    }
?>
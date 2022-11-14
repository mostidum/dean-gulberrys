<?php
    require_once "../includes/dbh.php";
    require_once "../includes/user-validation.php";

    if(checkTakenUsername($conn, "test") === true) {
        echo "Passed unit test 1.";
    }
    else {
        echo "Failed unit test 1.";
    }

    echo "<br>";

    if(checkTakenUsername($conn, "test0") === false) {
        echo "Passed unit test 2.";
    }
    else {
        echo "Failed unit test 2.";
    }

    echo "<br>";
?>
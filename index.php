<?php
    session_start();
    include_once('includes/dbh.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
   <?php
        include('includes/nav.php');
   ?>
    
    <h1>Home page under construction</h1>

    <?php
        if(isset($_SESSION["uid"])) {
            $uid = $_SESSION["uid"];
            echo "<h2>Username: $uid </h2>";
        } 
        else {
            echo "<h2>You need to sign in!</h2>";
        }
        
    ?>

    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
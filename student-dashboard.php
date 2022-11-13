<?php
    session_start();
    //If NOT logged in --> send to login page
    if (!isset($_SESSION["uid"])){
        header("location: ../login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
    <?php
        include('includes/nav.php');
    ?>
    
<!-- Cards start here-->
    <h1>Welcome to the dashboard</h1>
    <div class="card-container">
        <a href="course-registration.php">
            <div class="card">
                <h3>Register for Classes</h3>
                <p>Choose the classes you want for the upcoming semester. View course schedule, date, time, location, professor, and more!</p>
                
            </div>
        </a>
        <a href="#">
            <div class="card">
                <h3>Check Grades</h3>
                <p>See how bad you're doing in school right now! Calculate how much you'll need on the final to pass with a C!</p>
            </div>
        </a>
        <a href="#">
            <div class="card">
                <h3>Do Something</h3>
                <p>Honestly idek. Click for good luck I guess.</p>
                
            </div>
        </a>
    </div>
<!-- Cards end here-->

    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
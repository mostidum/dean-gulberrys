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
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
    <?php
        include('includes/nav.php');
    ?>
    
<!-- Cards start here-->
    <h1>Welcome to the dashboard</h1>
    <div class="card-container">
        <a href="student-registration.php">
            <div class="card">
                <h3>Register a Student</h3>
                <p>Give a new student credentials and get them ready to go for school!</p>
                
            </div>
        </a>
        <a href="add-course.php">
            <div class="card">
                <h3>Add Courses</h3>
                <p>Add new courses to the schools course catalog including name, date, id, and more.</p>
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
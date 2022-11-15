<?php
    session_start();
    include 'includes/session-check-block-faculty.php';
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
</head>
<body> 
    <?php
        include('includes/nav.php');
    ?>
    
<!-- Cards start here-->
    <!-- <h1>Welcome to the dashboard</h1>
    <div class="card-container">
        <a href="course-registration.php">
            <div class="card">
                <h3>Register for Classes</h3>
                <p>Choose the classes you want for the upcoming semester. View course schedule, date, time, location, professor, and more!</p>
                
            </div>
        </a>
        <a href="major-course-requirements.php">
            <div class="card">
                <h3>Major Course Requirements</h3>
                <p>Check how many more long, miserable classes you have left in your degree. Look at this to contemplate committing scooter ankle!</p>
                
            </div>
        </a>
        <a href="#">
            <div class="card">
                <h3>Do Something</h3>
                <p>Honestly idek. Click for good luck I guess.</p>
            </div>
        </a>
    </div> -->
<!-- Cards end here-->

<div class="container d-flex justify-content-center align-items-center mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4 mx-auto ">
    <div class="col">
        <div class="card h-100">
        <div class="card-body stretch-link">
            <h5 class="card-title">Register for Classes</h5>
            <p class="card-text">Choose the classes you want for the upcoming semester. View course schedule, date, time, location, professor, and more!</p>
            <form action="course-registration.php">
                <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="button" name="submit">Go</button>
            </form>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title">Major Course</h5>
            <p class="card-text">Check how many more long, miserable classes you have left in your degree. Look at this to contemplate committing scooter ankle!</p>
            <form action="major-course-requirements.php">
                <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="button" name="submit">Go</button>
            </form>
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            <form action="#">
                <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="button" name="submit">Go</button>
            </form>
        </div>
        </div>
    </div>
    <div class="col h-100">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. And now it is even longer.</p>
            <form action="#">
                <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="button" name="submit">Go</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>


    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
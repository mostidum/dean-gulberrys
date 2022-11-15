<?php
    session_start();
    include 'includes/session-check-block-faculty.php';
    //If NOT logged in --> send to login page
    if (!isset($_SESSION["uid"])){
        header("location: /login.php");
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
                    <h5 class="card-title">View Schedule</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    <form action="view-schedule.php">
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
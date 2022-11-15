<?php
    session_start();
    include 'includes/session-check-block-student.php';
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
    
<div class="container d-flex justify-content-center align-items-center mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4 mx-auto ">
        <div class="col">
            <div class="card h-100">
            <div class="card-body stretch-link">
                <h5 class="card-title">Add Course</h5>
                <p class="card-text">Add new courses to the schools course catalog including name, date, id, and more.</p>
                <form action="add-course.php">
                    <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="button" name="submit">Go</button>
                </form>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Add Class</h5>
                <p class="card-text">Add a new class for the current schedule.</p>
                <form action="add-class.php">
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

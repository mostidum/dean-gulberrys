<?php
    session_start();
    include 'includes/session-check-block-faculty.php';
    @$search = $_GET['search'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
    <?php
        include('includes/nav.php');
    ?>

    <div class="row justify-content-center mx-auto mt-5 "> 
        <div class="col-auto">
            <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand">Register For A Course</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">

                            </ul>
                        </div>
                    </div>
                </nav>
            <div class="table-responsive vh-100 bg-light">
                <table class="table table-light table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Select</th>
                            <th scope="col">Record</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Units</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Schedule #</th>
                            <th scope="col">Course Department</th>
                            <th scope="col">Course Location</th>
                            <th scope="col">Is Graduate Course?</th>
                            <th scope="col">Prerequisite(s)</th>
                            <th scope="col">Instructor</th>
                        </tr>
                    </thead>

                    <?php
                        include_once('includes/dbh.php');

                        //$query = '%'.$search.'%';
                        //Searches for query in Course Title, Course Description, and Course Department 
                        //$sql = "SELECT * FROM course WHERE course_title LIKE '$query' OR course_description LIKE '$query' OR department LIKE '$query'";
                        $student_id = $_SESSION["uid"];
                        //$sql = "SELECT * FROM course JOIN class ON course.course_id = class.course_id JOIN record ON class.course_id=record.course_id WHERE NOT student_id = '$student_id'";
                        $sql = "SELECT * FROM course JOIN class ON course.course_id = class.course_id JOIN record ON class.course_id=record.course_id WHERE NOT student_id = '$student_id'";
                        $result = $conn->query($sql);   
                        while($row = mysqli_fetch_assoc($result)) {
                    ?> 
                    
                    <tr>
                        <form action="course-registration-process.php" method="post">
                            <!-- <td><button class="btn btn-secondary" name="sign-up">Sign up</button></td> -->
                            <td><button class="btn btn-outline-primary btn-sm m-0 waves-effect" name="sign-up">add</button></td>
                            <td><?php echo $row["record_id"]?></td>
                            <td><input type="hidden" value=<?php echo $row["course_id"]?> name="course-id"><?php echo $row["course_id"]?></td>
                            <td><?php echo $row["course_title"]?></td>
                            <td><?php echo $row["course_description"]?></td>
                            <td><?php echo $row["units"]?></td>
                            <td><?php echo $row["time_start"]?></td>
                            <td><?php echo $row["schedule"]?></td>
                            <td><?php echo $row["department"]?></td>
                            <td><?php echo $row["location"]?></td>
                            <td><?php echo $row["graduate"]?></td>
                            <td><?php echo $row["prerequisites"]?></td>
                            <td><?php echo $row["instructor_id"]?></td>
                        </form>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    


    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
<?php
    session_start();
    include 'includes/session-check-block-faculty.php';
    include('includes/dbh.php');
    $semester = @$_GET["semester"];
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

    <div class="row justify-content-center mx-auto mt-5">
        <div class="col-auto">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand">Courses</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" type="button" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Term
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="view-schedule.php?semester=All%20Semesters">All Terms</a></li>
                                    <?php
                                        $uid = $_SESSION['uid'];
                                        $sql = "SELECT DISTINCT semester FROM class JOIN record ON class.course_id=record.course_id WHERE student_id = $uid";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result)){
                                            $choice = $row['semester'];
                                            $ref = "view-schedule.php?semester=" . $choice;
                                            echo "<li><a class='dropdown-item' href='$ref'>" . $choice . "</li>";
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="table-responsive">
                <table class="table table-light table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Select</th>
                            <th scope="col">Grade</th>
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

                        //Searches for query in Course Title, Course Description, and Course Department 
                        //$sql = "SELECT * FROM course WHERE course_title LIKE '$query' OR course_description LIKE '$query' OR department LIKE '$query'";
                        $student_id = $_SESSION["uid"];
                        
                        
                        if ($semester == "All Semesters"){
                            $result = $conn->query("SELECT * FROM record INNER JOIN class on record.course_id = class.course_id INNER JOIN course on record.course_id = course.course_id INNER JOIN faculty on class.instructor_id = faculty.faculty_id WHERE record.student_id = '$student_id'");  
                        }
                        else{
                            $result = $conn->query("SELECT * FROM record INNER JOIN class on record.course_id = class.course_id INNER JOIN course on record.course_id = course.course_id INNER JOIN faculty on class.instructor_id = faculty.faculty_id WHERE record.student_id = '$student_id' AND class.semester = '$semester'");  //AND `class.semester` = '$semester'
                        }

                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    
                        <tr>
                            <form action="remove-class.php" method="post">
                                <td><button tpye="button" class="btn btn-outline-primary btn-sm m-0 waves-effect" name="removeClass">remove</button></td>
                                <td><?php echo $row["grade"]?></td>
                                <td><input type="hidden" value=<?php echo $row["course_id"]?> name="course-id"><?php echo $row["course_id"]?></td>
                                <td><?php echo $row["course_title"]?></td>
                                <td><?php echo $row["course_description"]?></td>
                                <td><?php echo $row["units"]?></td>
                                <td><?php echo $row["days"].": ".$row["time_start"]."-".$row["time_end"]?></td>
                                <td><?php echo $row["schedule"]?></td>
                                <td><?php echo $row["department"]?></td>
                                <td><?php echo $row["location"]?></td>
                                <td><?php echo $row["graduate"]?></td>
                                <td><?php echo $row["prerequisites"]?></td>
                                <td><?php echo $row["name"]?></td>
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
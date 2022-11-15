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

    <h1>Courses - Semester: <?php echo $semester?></h1>
    <div class="form-outline mb-3 w-25">
        <form class="mx-1 mx-md-4" action="view-schedule-process.php" method="post">
            <select name="semester" class="form-control">
            <label class="form-label" for="semester">Semester</label>
            <option></option>
            <option value="All Semesters">All Semesters</option>
                <?php
                    $uid = $_SESSION['uid'];
                    $sql = "SELECT DISTINCT semester FROM class JOIN record ON class.course_id=record.course_id WHERE student_id = $uid";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                        echo "<option>" .$row['semester']. "</option>";
                    }
                ?>
            </select>
            <button type="submit" class="btn btn-secondary" name="submit-semester">Submit</button>
        </form>
    </div>

    <table class="table table-light">
    <thead>
        <tr>
            <th scope="col">Select</th>
            <th scope="col">Grade</th>
            <th scope="col">Course ID</th>
            <th scope="col">Course Title</th>
            <th scope="col">Course Description</th>
            <th scope="col">Units</th>
            <th scope="col">Course Date and Time</th>
            <th scope="col">Schedule Number</th>
            <th scope="col">Course Department</th>
            <th scope="col">Course Location</th>
            <th scope="col">Is Graduate Course?</th>
            <th scope="col">Course Prerequisite(s)</th>
            <th scope="col">Instructor Name</th>
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
                <td><button class="btn btn-secondary" name="sign-up">remove</button></td>
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


    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
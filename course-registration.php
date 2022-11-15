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

    <h1>Courses</h1>
    <!-- <p>
    <?php 
        // if ($search != "") {
        //     echo "You searched for: $search";
        // }
    ?>
    </p>
    < <form action="course-registration.php">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit">
    </form> !-->

    <table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Select</th>
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
            <th scope="col">Instructor ID</th>
        </tr>
    </thead>
    <?php
        include_once('includes/dbh.php');

        //$query = '%'.$search.'%';
        //Searches for query in Course Title, Course Description, and Course Department 
        //$sql = "SELECT * FROM course WHERE course_title LIKE '$query' OR course_description LIKE '$query' OR department LIKE '$query'";
        $student_id = $_SESSION["uid"];
        $sql = "SELECT * FROM course INNER JOIN class on course.course_id = class.course_id;";
        $result = $conn->query($sql);   
        

       

        while($row = mysqli_fetch_assoc($result)) {
            $tempid = $_SESSION['uid'];
            $tempCourseID = $row['course_id'];
            $temp = "SELECT * FROM record where course_id = '$tempCourseID' and student_id = '$tempID'"
            //if($temp>0)
    ?> 
        <tr>
            <form action="course-registration-process.php" method="post">
                <td><button class="btn btn-secondary" name="sign-up">Sign up</button></td>
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
        </tbody>
        <?php
            }
        ?>
    </table>


    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
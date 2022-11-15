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


    <table>
        <tr>
            <th>Select</th>
            <th>Course ID</th>
            <th>Course Title</th>
            <th>Course Description</th>
            <th>Units</th>
            <th>Course Date and Time</th>
            <th>Schedule Number</th>
            <th>Course Department</th>
            <th>Course Location</th>
            <th>Is Graduate Course?</th>
            <th>Course Prerequisite(s)</th>
            <th>Instructor ID</th>
        </tr>
    <?php
        include_once('includes/dbh.php');

        $query = '%'.$search.'%';
        //Searches for query in Course Title, Course Description, and Course Department 
        //$sql = "SELECT * FROM course WHERE course_title LIKE '$query' OR course_description LIKE '$query' OR department LIKE '$query'";
        $sql = "SELECT * FROM course INNER JOIN class on course.course_id = class.course_id INNER JOIN faculty on class.instructor_id = faculty.faculty_id INNER JOIN record on course.course_id = record.course_id";
        $result = $conn->query($sql);   
        

       

        while($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <form action="remove-class.php" method="post">
                <td><button name="sign-up">remove</button></td>
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
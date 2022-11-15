<?php
    session_start();
    include 'includes/session-check-block-student.php';
    if (!isset($_POST["see-students"])){
        header("location: ../faculty-courses.php");
    }
    
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
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Current Grade</th>
            <th scope="col">New Grade</th>
            <th scope="col"></th>
        </tr>
  </thead>
    <?php
        include_once('includes/dbh.php');
        $courseID = $_POST["course-id"];
        
        $sql = "SELECT * FROM record JOIN student ON record.student_id=student.student_id WHERE course_id = '$courseID'";
        $result = $conn->query($sql);   

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        
    <tbody>
        <tr>
            <form action="edit-grades-process.php" method="post">
                <td><input type="hidden" value=<?php echo $row["student_id"]?> name="student-id"><?php echo $row["name"]?></td>
                <td><input type="hidden" value=<?php echo $row["course_id"]?> name="course_id"><?php echo $row["grade"]?></td>
                <td><input class="form-control" name="grade" placeholder="Enter new grade..."></td>
                <td><button class="btn btn-secondary" name="edit-grades">Submit New Grade</button></td>
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
<?php
    session_start();
    include 'includes/session-check-block-student.php';
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
    <p>
    <?php 
        if ($search != "") {
            echo "You searched for: $search";
        }
    ?>
    </p>
    <form action="course-registration.php">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit">
    </form>

    <table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Course Title</th>
            <th scope="col">Schedule #</th>
            <th scope="col">Select Course</th>
        </tr>
  </thead>
    <?php
        include_once('includes/dbh.php');

        $uid = $_SESSION["uid"];

        $query = '%'.$search.'%';
        $sql = "SELECT * FROM class JOIN course ON class.course_id=course.course_id WHERE class.instructor_id = '$uid'";
        $result = $conn->query($sql);   

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        
    <tbody>
        <tr>
            <form action="edit-course-grades.php" method="post">
                <td><input type="hidden" value=<?php echo $row["course_id"]?> name="course-id"><?php echo $row["course_title"]?></td>
                <td><?php echo $row["schedule"]?></td>
                <td><button class="btn btn-secondary" name="edit-grades">See Students</button></td>
        </tr>
    </tbody>
</table>
        <?php
            }
        ?>
    </table>


    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
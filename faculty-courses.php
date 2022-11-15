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

    <table>
    <thead>
        <tr>
            <th scope="col">Course Title</th>
            <th scope="col">Schedule #</th>
        </tr>
  </thead>
    <?php
        include_once('includes/dbh.php');

        $uid = $_SESSION["uid"];

        $query = '%'.$search.'%';
        $sql = "SELECT * FROM class WHERE instructor_id = '$uid' JOIN course ON class.course_id=course.course_id";
        $result = $conn->query($sql);   

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <table class="table table-dark">
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td><?php echo $row["student_id"]?></td>
            <td><?php echo $row["student_id"]?></td>
            <td><?php echo $row["student_id"]?></td>
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
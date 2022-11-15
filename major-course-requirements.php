<?php
    session_start();
    include 'includes/session-check.php';

    @$search = $_GET['search'];
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Major Course Requirements</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
        include('includes/nav.php');
    ?>
<!-- Card starts here -->
<h1>Majors</h1>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Student ID</th>
            <th scope="col">Major ID</th>
            <th scope="col">Major Title</th>
            <th scope="col">Department</th>
            <th scope="col">Units Required</th>
            <th scope="col">Courses</th>
            <th scope="col">Outline ID</th>
        </tr>
    </thead>

<?php
        include_once('includes/dbh.php');
        $uid = $_SESSION["uid"];

        $sql = "SELECT student.name as student_name, student.student_id, major_id, major.name, major.units, major.department, major.outline_id  FROM student JOIN major ON student.major=major.department WHERE student_id=$uid";
        $result = $conn->query($sql);   

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $row["student_name"]?></td>
            <td><?php echo $row["student_id"]?></td>
            <td><?php echo $row["major_id"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["units"]?></td>
            <td><?php echo $row["department"]?></td>
            <td><button class="btn btn-secondary">Courses</button></td>
            <td><?php echo $row["outline_id"]?></td>
            
        </tr>
    
    <?php
        }
    ?>
    </table>

<!-- Card ends here -->
    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
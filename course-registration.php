<?php
    include_once('includes/dbh.php');
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);   
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
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <table>
        <tr>
            <th>Select</th>
            <th>Course ID</th>
            <th>Course Description</th>
            <th>Units</th>
            <th>Course Date and Time</th>
            <th>Schedule Number</th>
            <th>Course Department</th>
            <th>Course Location</th>
            <th>Is Graduate Course?</th>
            <th>Course Prerequisite(s)</th>
        </tr>
        <tr>
            <td><button>Sign up</button></td>
            <td><?php echo $row["course_id"]?></td>
            <td><?php echo $row["course_description"]?></td>
            <td><?php echo $row["units"]?></td>
            <td><?php echo $row["datetime"]?></td>
            <td><?php echo $row["schedule"]?></td>
            <td><?php echo $row["department"]?></td>
            <td><?php echo $row["location"]?></td>
            <td><?php echo $row["graduate"]?></td>
            <td><?php echo $row["prerequisites"]?></td>
            
        </tr>
    </table>
    <?php
        }
    ?>

    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
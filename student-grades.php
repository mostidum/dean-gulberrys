<?php
    session_start();
    include 'includes/session-check-block-student.php';

    
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

    <h1>Course Grades</h1>
   
    <table>
        <tr>
            <th>Course Title</th>
            <th>Course Grade</th>
        </tr>
    <?php
        include_once('includes/dbh.php');

        $query = '%'.$search.'%';
        //Searches for query in Course Title, Course Description, and Course Department
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);   

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $row["course_title"]?></td>
            <td><?php //echo $row["course_description"]?></td>
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
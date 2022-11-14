<?php
    session_start();
    include 'includes/session-check-block-student.php';
    include_once('includes/dbh.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Student Record</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
    <?php
        include('includes/nav.php');
    ?>

    <h1>Electronic Student Record</h1>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Phone Number</th>
            <th>Student Address</th>
            <th>Student Date of Birth</th>
            <th>Student Major</th>
            <th>Student Minor</th>
            <th>Is a Graduate?</th>
            <th>Additional Notes</th>
        </tr>

    <?php
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $row["student_id"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["phone_number"]?></td>
            <td><?php echo $row["address"]?></td>
            <td><?php echo $row["birthday"]?></td>
            <td><?php echo $row["major"]?></td>
            <td><?php echo $row["minor"]?></td>
            <td><?php echo $row["graduate"]?></td>
            <td><?php echo $row["notes"]?></td>
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
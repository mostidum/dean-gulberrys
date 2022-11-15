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
    <table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Student Phone Number</th>
            <th scope="col">Student Address</th>
            <th scope="col">Student Date of Birth</th>
            <th scope="col">Student Major</th>
            <th scope="col">Student Minor</th>
            <th scope="col">Is a Graduate?</th>
            <th scope="col">Additional Notes</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <form action="edit-student-record.php" method="post">
                <td><input type="hidden" value=<?php echo $row["student_id"]?> name="student-id"><?php echo $row["student_id"]?></td>
                <td><input type="hidden" value=<?php echo $row["name"]?> name="name"><?php echo $row["name"]?></td>
                <td><input type="hidden" value=<?php echo $row["phone_number"]?> name="phone_number"><?php echo $row["phone_number"]?></td>
                <td><input type="hidden" value=<?php echo $row["address"]?> name="address"><?php echo $row["address"]?></td>
                <td><input type="hidden" value=<?php echo $row["birthday"]?> name="birthday"><?php echo $row["birthday"]?></td>
                <td><input type="hidden" value=<?php echo $row["major"]?> name="major"><?php echo $row["major"]?></td>
                <td><input type="hidden" value=<?php echo $row["minor"]?> name="minor"><?php echo $row["minor"]?></td>
                <td><input type="hidden" value=<?php echo $row["graduate"]?> name="graduate"><?php echo $row["graduate"]?></td>
                <td><input type="hidden" value=<?php echo $row["notes"]?> name="notes"><?php echo $row["notes"]?></td>
                <td><button class="btn btn-secondary" name="edit-student">Edit Student</button></td>
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
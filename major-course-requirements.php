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

<?php
        include_once('includes/dbh.php');

        $sql = "SELECT * FROM major";
        $result = $conn->query($sql);   

        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <table>
        <tr>
            <th>Major ID</th>
            <th>Major Title</th>
            <th>Department</th>
            <th>Units Required</th>
            <th>Courses</th>
            <th>Outline ID</th>
        </tr>
        <tr>
            
            <td><?php echo $row["major_id"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["units"]?></td>
            <td><?php echo $row["department"]?></td>
            <td><button>Courses</button></td>
            <td><?php echo $row["outline_id"]?></td>
            
        </tr>
    </table>
    <?php
        }
    ?>

<!-- Card ends here -->
    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
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
    <div class="container">
        <div class="row">
            <table bordercolor="magenta" class="table table-responsive table-dark">
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
                    if($row['student_id']== @$_GET['id'])
                    {
                        echo '<form class = "form-inline m-2" action = "erecordupdate.php?id="'.$row['student_id'].' "method = "post">';
                        echo "<td>".$row['student_id']."</td>";
                        echo '<td><input type = "text" class ="form-control" name = "name" value = "'.$row['name'].'"></td>';
                        echo '<td><input type = "number" class ="form-control" name = "phone_number" value = "'.$row['phone_number'].'"></td>';
                        echo '<td><input type = "text" class ="form-control" name = "address" value = "'.$row['address'].'"></td>';
                        echo '<td><input type = "date" class ="form-control" name = "birthday" value = "'.$row['birthday'].'"></td>';
                        echo '<td><input type = "text" class ="form-control" name = "major" value = "'.$row['major'].'"></td>';
                        echo '<td><input type = "text" class ="form-control" name = "minor" value = "'.$row['minor'].'"></td>';
                        echo '<td><input type = "checkbox" class = "form control" name = "graduate" value ="'.$row['graduate'].'"></td>';
                        echo '<td><input type = "text" class = "form control" name = notes ="'.$row['notes'].'"></td>';
                        echo '<td><button type ="submit" class = "btn btn-primary" name = "save">Save</button></td>';
                        echo '</form>';
                    }
                    else
                    {
                ?>
                    <tr>
                        
                            <td><?php echo $row["student_id"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["phone_number"] ?></td>
                            <td><?php echo $row["address"] ?></td>
                            <td><?php echo $row["birthday"] ?></td>
                            <td><?php echo $row["major"] ?></td>
                            <td><?php echo $row["minor"] ?></td>
                            <td><?php echo $row["graduate"] ?></td>
                            <td><?php echo $row["notes"] ?></td>
                            <td><a class="btn btn-primary" href = "electronic-student-record.php?id=<?php echo $row['student_id'];?>">Edit Student</button></td>
                        
                    </tr>
                <?php
                }
                }
                ?>
            </table>

        </div>



        <?php
        include('includes/footer.php');
        ?>
</body>

</html>
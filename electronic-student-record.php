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
                        <th scope="col" style="min-width: 120px;"></th>

                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['student_id']== @$_GET['id'])
                    {
                        echo '<form class = "form-inline m-2" action = "erecordupdate.php" method = "post">';
                        echo '<td><input type="hidden" name="student_id" value ="'.$row['student_id'].'">'.$row['student_id'].'</td>';
                        echo '<td><input type="text" class="form-control" name="name" value="'.$row['name'].'"></td>';
                        echo '<td><input type="tel" class="form-control" placeholder= "'.$row['phone_number'].'"name = "phone_number" value = "'.$row['phone_number'].'"></td>';
                        echo '<td><input type="text" class="form-control" name="address" value = "'.$row['address'].'"></td>';
                        echo '<td><input type="date" class="form-control" name="birthday" value = "'.$row['birthday'].'"></td>';
                        echo '<td><input type="text" class="form-control" name="major" value= "'.$row['major'].'"></td>';
                        echo '<td><input type="text" class="form-control" name="minor" value= "'.$row['minor'].'"></td>';
                        if ($row['graduate'] == 1){
                            $isChecked = "checked";
                        }
                        else {
                            $isChecked = "";
                        }
                        echo '<td><input type="checkbox" name="graduate" '.$isChecked.'></td>';
                        echo '<td><input type="text" class="form-control" name="notes" value="'.$row['notes'].'"></td>';
                        echo '<td><button type="submit" class="btn btn-secondary" name="gang">Save</button></td>';
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
                        <td>
                            <form class="form-inline m-2" action="electronic-student-record.php?id=<?php echo $row['student_id'];?>" method = "post">
                                <button type="submit" class="btn btn-secondary" name="edit-student">Edit Student</button>
                            </form>
                        </td>
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
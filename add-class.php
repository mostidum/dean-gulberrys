<?php
session_start();
include 'includes/session-check-block-student.php';
include 'includes/dbh.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Creation</title>
    <!--<link rel="stylesheet" href="css/styles.css"> !-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/studentRegister.js"></script>
</head>
<?php
include('includes/nav.php');
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Add
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Course</label>
                                <select id="department" name="department" class="form-select">
                                    <?php
                                    $sql = "SELECT * FROM course";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option>" . $row['course_id'] . "</option>";
                                    }
                                    ?>

                                </select>

                            </div>
                            <div class="mb-2">
                                <label>Instructor</label>
                                <select id="instructor" name="instructor" class="form-select">
                                    <?php
                                    $sql = "SELECT * FROM faculty";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option>" . $row['name'] . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-2 w-25">
                                <label>Start Time</label>
                                <input type="time" name="start_time" class="form-control">

                            </div>
                            <div class="mb-2 w-25">
                                <label>End Time</label>

                                <input type="time" name="end_time" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>location</label>
                                <input type="text" name="location" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>location</label>
                                <input type="text" name="location" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Semester</label>
                                <input type="text" name="semester" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Schedule number</label>
                                <input type="number" name="schedule number" class="form-control">
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
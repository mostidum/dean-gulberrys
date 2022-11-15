<?php
session_start();
include 'includes/session-check-block-student.php';
include 'includes/dbh.php';

    if (!isset($_SESSION["uid"])){
        header("location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Creation</title>
    

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
                        <form action="add-class-process.php" method="post">

                            <div class="mb-3">
                                <label>Course</label>
                                <select id="department" name="course" class="form-select">
                                    <option></option>
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
                                <label>Instructor ID</label>
                                <input type="number" name="faculty-id" class="form-control">

                                </select>
                            </div>
                            <div class="mb-2 w-25">
                                <label>Start Time (international)</label>
                                <input type="number" name="start_time" class="form-control" max=2400 min=0 placeholder="ex: 1200">
                            </div>
                            <div class="mb-2 w-25">
                                <label>End Time (international)</label>
                                <input type="number" name="end_time" class="form-control" max=2400 min=0 placeholder="ex: 1800">
                            </div>
                            <div class="mb-2 w-25">
                                <label>Meeting days</label>
                                <input type="text" name="days" class="form-control" placeholder="ex: MWF or TTH">
                            </div>

                            <div class="mb-2">
                                <label>Schedule Number</label>
                                <input type="number" name="schedule_num" class="form-control">
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
                                <button type="submit" name="save_class" class="btn btn-primary">Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
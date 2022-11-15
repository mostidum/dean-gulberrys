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
    <title>Course Add</title>
</head>
    <?php
        include('includes/nav.php');
        include('includes/dbh.php');
    ?>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Course Add
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="add-course-process.php" method="post">
                            <div class="mb-2">
                                <label>Course Title</label>
                                <input type="text" name="course-title" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Course Description</label>
                                <input type="text" name="course-description" class="form-control">
                            </div>
                            <div class="mb-2 w-25">
                                <label>Units</label>
                                <input type="number" name="units" class="form-control" max=999 min=0 placeholder="ex: 3">
                            </div>
                            <div class="mb-3">
                                <label>Department</label>
                                <select id="department" name="department" class="form-select">
                                    <option></option>
                                    <?php
                                        $sql = "SELECT * FROM department";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option>" . $row['department_name'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label>Prerequisites</label>
                                <input type="text" name="prerequisites" class="form-control">
                            </div>
                            <div class="mb-2 w-25">
                                <label>Course Number</label>
                                <input type="number" name="course-number" class="form-control" max=999 min=0 placeholder="ex: 80">
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="graduate">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Graduate Course
                                </label>
                            </div>
                            
                          


                            <div class="mb-2">
                                <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



    <?php
        include('includes/footer.php');
    ?>
</html>
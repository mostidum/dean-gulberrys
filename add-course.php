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
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="../js/studentRegister.js"></script>
</head>
    <?php
        include('includes/nav.php');
        include('includes/dbh.php');
    ?>

    <body>
        <div class="register-container">
            <div class="register-form">
                <h1>Add a new course</h1>
                <form action="add-course-process.php" method="post">
                    <label for="course-title">Course Title</label><br>
                    <input type="text" id="course-title" name="course-title"><br>
                    
                    <label for="course-description">Course Description</label><br>
                    <input type="text" id="course-description" name="course-description"><br>
                    
                    <label for="units">Units</label><br>
                    <input type="number" id="units" name="units"><br>

                    <label for="department">Department</label><br>
                    <select id="department" name="department">
                        <?php
                            $sql = "SELECT * FROM department";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                echo "<option>" .$row['department_name']. "</option>";
                            }
                        ?>

                    </select><br>

                    <label for="prerequisites">Prerequisites</label><br>
                    <input type="text" id="prerequisites" name="prerequisites"><br>

                    <label for="course-number">Course Number</label><br>
                    <input type="number" id="course-number" name="course-number" min="10" max="999"><br>

                    <label for="graduate">Is Graduate Course?</label>
                    <input type="checkbox" id="graduate" name="graduate" placeholder="1 for graduate else 0"><br>

                    <br><button type="submit" id="button" name="submit">Add Course</button>

                    <p1 id="errorMessage"></p1>
                </form>
            </div>
        </div>
    </body>

    <?php
        include('includes/footer.php');
    ?>
</html>
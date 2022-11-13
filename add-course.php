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
    ?>

    <body>
        <div class="register-container">
            <div class="register-form">
                <h1>Add a new course</h1>
                <form>
                    <label for="username">Course ID</label><br>
                    <input type="number" id="course-id"><br>
                    
                    <label for="password">Course Description</label><br>
                    <input type="text" id="course-description"><br>
                    
                    <label for="confirmPass">Units</label><br>
                    <input type="number" id="units"><br>
                    
                    <label for="name">Date and Time</label><br>
                    <input type="datetime-local" id="date-time"><br>

                    <label for="phone">Schedule</label><br>
                    <input type="int" id="schedule"><br>

                    <label for="address">Department</label><br>
                    <input type="text" id="department"><br>

                    <label for="birthday">Location</label><br>
                    <input type="text" id="location"><br>

                    <label for="major">Is Graduate Course?</label><br>
                    <input type="int" id="graduate" placeholder="1 for graduate else 0"><br>

                    <label for="minor">Prerequisites</label><br>
                    <input type="text" id="prerequisites"><br>

                    <br><button type="submit" id="button" onclick="tests()">Add Course</button>
                    <p1 id="errorMessage"></p1>
                </form>
            </div>
        </div>
    </body>

    <?php
        include('includes/footer.php');
    ?>
</html>
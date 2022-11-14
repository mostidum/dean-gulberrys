<?php
    session_start();
    include 'includes/session-check-logins.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
    <?php
        include('includes/nav.php');
        include('includes/dbh.php');
    ?>

    <body>
        <div class="register-container">
            <div class="register-form">
                <h1> Register a new faculty account</h1>
                <p>Already have an account? <a href="login.php">Log in</a></p>
                <form action="faculty-register-process.php" method="post">

                    <label for="username">Username:</label><br>
                    <input type="text" name="username"><br>
                    
                    <label for="password">Password:</label><br>
                    <input type="password" name="password"><br>
                    
                    <label for="confirmPass">Confirm Password:</label><br>
                    <input type="password" name="confirmPass"><br>
                    
                    <label for="name">Name:</label><br>
                    <input type="text" name="name"><br>

                    <label for="position">Position:</label><br>
                    <input type="text" name="position"><br>

                    <label for="phone">Phone Number:</label><br>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"><br>

                    <label for="officeNumber">Office Number:</label><br>
                    <input type="text" name="officeNumber"><br>

                    <label for="officeHours">Office Hours:</label><br>
                    <input type="datetime-local" name="officeHours"><br>

                    <label for="department">Department:</label><br>
                    <input type="text" name="department"><br>

                    <br><button type="facultySubmit" name="facultySubmit">Register</button>
                    <p1 id="errorMessage"></p1>
                </form>
            </div>
        </div>
    </body>

    <php>

    </php>


    <?php
        include('includes/footer.php');
    ?>
</html>
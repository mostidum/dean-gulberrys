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
                <h1> Register a new student account</h1>
                <p>Already have an account? <a href="login.php">Log in</a></p>
                <form action="student-dashboard.php">

                    <label for="username">Username:</label><br>
                    <input type="text" id="username"><br>
                    
                    <label for="password">Password:</label><br>
                    <input type="password" id="password"><br>
                    
                    <label for="confirmPass">Confirm Password:</label><br>
                    <input type="password" id="confirmPass"><br>
                    
                    <label for="name">Name:</label><br>
                    <input type="text" id="name"><br>

                    <label for="phone">Phone Number:</label><br>
                    <input type="tel" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"><br>

                    <label for="address">Address:</label><br>
                    <input type="text" id="address"><br>

                    <label for="birthday">Birthday:</label><br>
                    <input type="date" id="birthday"><br>

                    <label for="major">Major:</label><br>
                    <input type="text" id="major"><br>

                    <label for="minor">Minor:</label><br>
                    <input type="text" id="minor"><br>

                    <br><button type="submit" id="button" onclick="tests()">Register</button>
                    <p1 id="errorMessage"></p1>
                </form>
            </div>
        </div>
    </body>

    <?php
        include('includes/footer.php');
    ?>
</html>
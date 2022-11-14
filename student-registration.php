<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
    <?php
        include('includes/nav.php');
        include('includes/dbh.php');
    ?>

    <body>
        <div class="register-container">
            <div class="register-form">
                <h1> Register a new student account</h1>
                <p>Already have an account? <a href="login.php">Log in</a></p>
                <form action="student-register-process.php" method="post">

                    <label for="username">Username:</label><br>
                    <input type="text" name="username"><br>
                    
                    <label for="password">Password:</label><br>
                    <input type="password" name="password"><br>
                    
                    <label for="confirmPass">Confirm Password:</label><br>
                    <input type="password" name="confirmPass"><br>
                    
                    <label for="name">Name:</label><br>
                    <input type="text" name="name"><br>

                    <label for="phone">Phone Number:</label><br>
                    <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"><br>

                    <label for="address">Address:</label><br>
                    <input type="text" name="address"><br>

                    <label for="birthday">Birthday:</label><br>
                    <input type="date" name="birthday"><br>

                    <label for="major">Major:</label><br>
                    <input type="text" name="major"><br>

                    <label for="minor">Minor:</label><br>
                    <input type="text" name="minor"><br>

                    <br><button type="submit" name="submit">Register</button>
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
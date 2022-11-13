<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
        include('includes/nav.php');
    ?>
    
    <!-- Login container starts here -->
    <div class="login-container">
        <div class="login-form"> 
            <h2 id>Login Here</h2>
            <p>Don't have an account? <a href="student-registration.php">Register</a></p>
            <form action="student-dashboard.php">
                    <label for="account-type">Choose account type:</label>
                    <select id="account-type" name="account-type">
                    <option value="" disabled selected>Choose Type</option>
                        <option value="student">Student</option>
                        <option value="faculty">Faculty</option>
                    </select> <br>
                <label for="student-id">Student/Faculty ID:</label><br>
                <input type="number" id="student-id" name="fstudent-id"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <button type="submit" id="button">Login</button>
            </form>
        </div> 
    </div>
    <!-- Login container ends here -->

    <?php
        include('includes/footer.php');
    ?>
</body>
</html>
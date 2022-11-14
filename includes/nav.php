<!-- Navigation Bar starts here -->
<div class="navbar">
    <div class="logo">
        <a href="index.php"><img src="assets/universitySeal.png"></a>
    </div>
    <div class="links">
        <a class="nav-links" href="index.php">Home</a>
        <a class="nav-links" href="login.php">Login</a>
        <a class="nav-links" href="student-registration.php">Register</a>
        <a class="nav-links" href="student-dashboard.php">Student Dashboard</a>
        <a class="nav-links" href="faculty-dashboard.php">Faculty Dashboard</a>
        <a class="nav-links" href="electronic-student-record.php">eStudent Record</a>
        <a class="nav-links" href="course-registration.php">Course Registration</a>
        <a class="nav-links" href="major-course-requirements.php">Major Requirements</a>
        <?php 
            if (!isset($_SESSION["uid"])){
                //Display links if NOT logged in
                echo " 
                    <a class=\"nav-links\" href=\"login.php\">Login</a>
                    <a class=\"nav-links\" href=\"student-registration.php\">Register</a>
                    ";
            }
            else{
                //Display links if user IS logged in
                echo"
                <a class=\"nav-links\" href=\"student-dashboard.php\">Student Dashboard</a>
                <a class=\"nav-links\" href=\"faculty-dashboard.php\">Faculty Dashboard</a>
                <a class=\"nav-links\" href=\"electronic-student-record.php\">eStudent Record</a>
                <a class=\"nav-links\" href=\"course-registration.php\">Course Registration</a>
                <a class=\"nav-links\" href=\"logout.php\">Logout</a>
                <a class=\"nav-links\" href=\"major-course-requirements.php\">Major Requirements</a>
                ";
            }
        ?>
        
    </div>
</div>
<!-- Navigation Bar ends here -->
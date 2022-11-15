<!-- Navigation Bar starts here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/background.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <!-- <img src="assets/universitySeal.png" alt="Logo" width="80" height="80"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <?php 
            if (!isset($_SESSION["uid"])){
                //Display links if NOT logged in
                echo " 
                    <a class=\"nav-link\" href=\"login.php\">Login</a>
                    <a class=\"nav-link\" href=\"student-registration.php\">Student Register</a>
                    <a class=\"nav-link\" href=\"faculty-registration.php\">Faculty Register</a>";
            }
            else{
                //Display links if user IS logged in
                if ($_SESSION["account-type"] === "faculty"){
                    echo"
                        <a class=\"nav-link\" href=\"faculty-dashboard.php\">Faculty Dashboard</a>
                        <a class=\"nav-link\" href=\"electronic-student-record.php\">eStudent Record</a>
                        <a class=\"nav-link\" href=\"logout.php\">Logout</a>";
                }
                else if ($_SESSION["account-type"] === "student"){
                    echo"
                        <a class=\"nav-link\" href=\"student-dashboard.php\">Student Dashboard</a>
                        <a class=\"nav-link\" href=\"logout.php\">Logout</a>";
                } 
                else{
                    echo "<a class=\"nav-link\" href=\"index.php\">Uh oh spagetti-o</a>";
                }
            }
        ?>
        </ul>
        </div>
    </div>
    </nav>
</body>
</html>
<!-- Navigation Bar ends here -->
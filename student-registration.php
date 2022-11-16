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
</head>
    <?php
        include('includes/nav.php');
        include('includes/dbh.php');
    ?>

    <body>
    <section class="vh-100 mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-top h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <form class="mx-1 mx-md-4" action="student-register-process.php" method="post">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="username" class="form-control" />
                                            <label class="form-label" for="username">Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="password" class="form-control" />
                                            <label class="form-label" name="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="confirmPass" class="form-control" />
                                            <label class="form-label" name="confirmPass">Confirm Password</label>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" class="form-control" />
                                            <label class="form-label" for="name">Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="tel" name="phone" class="form-control" />
                                            <label class="form-label" for="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">Phone</label>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="address" class="form-control" />
                                            <label class="form-label" for="address">Address</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="date" name="birthday" class="form-control" />
                                            <label class="form-label" for="birthday">Birthday</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <select name="major" class="form-control">
                                                <option></option>
                                                <?php
                                                    $sql = "SELECT * FROM major";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row = mysqli_fetch_array($result)){
                                                        echo "<option>" .$row['department']. "</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label class="form-label" for="major">Major</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <select name="minor" class="form-control">
                                                <option></option>
                                                <?php
                                                    $sql = "SELECT * FROM minor";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row = mysqli_fetch_array($result)){
                                                        echo "<option>" .$row['department']. "</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label class="form-label" for="minor">Minor</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="submit">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="assets/universitySeal.png"
                                    class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
        if(isset($_GET["error"]))
        {

            if($_GET["error"] == "emptyUsername"){
                echo "<p>Username is empty</p>";
            }
            if($_GET["error"] == "emptyPassword"){
                echo "<p>Password is empty</p>";
            }
            if($_GET["error"] == "emptyConfirmPass"){
                echo "<p>Confirm Password is empty</p>";
            }
            if($_GET["error"] == "emptyName"){
                echo "<p>Name is empty</p>";
            }
            if($_GET["error"] == "emptyPhone"){
                echo "<p>Phone is empty</p>";
            }
            if($_GET["error"] == "emptyAddress"){
                echo "<p>Address is empty</p>";
            }
            if($_GET["error"] == "emptyBirthday"){
                echo "<p>Birthday is empty</p>";
            }
            if($_GET["error"] == "invalidUsername"){
                echo "<p>Username is invalid</p>";
            }
            if($_GET["error"] == "invalidPassword"){
                echo "<p>Password is invalid</p>";
            }
            if($_GET["error"] == "passwordsDontMatch"){
                echo "<p>Passwords don't match</p>";
            }
            if($_GET["error"] == "usernameTaken"){
                echo "<p>Username is taken</p>";
            }
            if($_GET["error"] == "couldNotCreateAccount"){
                echo "<p>Could not create account</p>";
            }
        }
    ?>

    </section>
    </body>

    <php>

    </php>


    <?php
        include('includes/footer.php');
    ?>
</html>
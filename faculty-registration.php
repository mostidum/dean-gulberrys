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
</head>
    <?php
        include('includes/nav.php');
        include('includes/dbh.php');
    ?>

    <body>
    <section class="vh-100 mt-4">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    <form class="mx-1 mx-md-4" action="faculty-register-process.php" method="post">
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
                                            <select name="position" class="form-control">
                                                <option></option>
                                                <option>Professor</option>
                                                <option>Advisor</option>
                                            </select>
                                            <label class="form-label" for="position">Position</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="tel" name="phone" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" />
                                            <label class="form-label" for="phone">Phone</label>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="officeNumber" class="form-control" />
                                            <label class="form-label" for="officeNumber">Office Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <select name="department" class="form-control">
                                                <option></option>
                                                <?php
                                                    $sql = "SELECT * FROM department";
                                                    $result = mysqli_query($conn, $sql);
                                                    while($row = mysqli_fetch_array($result)){
                                                        echo "<option>" .$row['department_name']. "</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label class="form-label" for="department">Department</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="facultySubmit">Register</button>
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
    </section>
    </body>


    <php>

    </php>


    <?php
        include('includes/footer.php');
    ?>
</html>
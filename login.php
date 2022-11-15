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
    <title>Login</title>
</head>
    
    <body>
        <?php
            include('includes/nav.php');
        ?>

        <section class="vh-100">
            <div class="container py-5 h-50">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="  pb-5">
                        <form action="login-process.php" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="uid" name="uid" class="form-control form-control-lg" />
                                <label class="form-label" for="uid">Username</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit" id="button" name="submit">Login</button>
                            </div>

                            <div>
                            <p class="mb-0">Don't have an account? <a href="student-registration.php" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                            </div>
                        </form> 
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </body>
    <?php
        include('includes/footer.php');
    ?>
</html>


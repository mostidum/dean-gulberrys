<?php
session_start();
include 'includes/session-check-block-student.php';
include_once('includes/dbh.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Hours</title>
</head>

<body>
    <?php
        include('includes/nav.php');
    ?>

<section class="vh-100 mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-top h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Office Hours</p>
                                    <form class="mx-1 mx-md-4" action="office-hours-process.php" method="post">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="monday-start" class="form-control" />
                                            <label class="form-label" for="monday-start">Monday Start</label>
                                            </div>
                                       
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="monday-end" class="form-control" />
                                            <label class="form-label" name="monday-end">Monday End</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="tuesday-start" class="form-control" />
                                            <label class="form-label" for="tuesday-start">Tuesday Start</label>
                                            </div>
                                       
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="tuesday-end" class="form-control" />
                                            <label class="form-label" name="tuesday-end">Tuesday End</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="wednesday-start" class="form-control" />
                                            <label class="form-label" for="wednesday-start">Wednesday Start</label>
                                            </div>
                                       
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="wednesday-end" class="form-control" />
                                            <label class="form-label" for="wednesday-end">Wednesday End</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="thursday-start" class="form-control" />
                                            <label class="form-label" for="thursday-start">Thursday Start</label>
                                            </div>
                                       
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="thursday-end" class="form-control" />
                                            <label class="form-label" for="thursday-end">Thursday End</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="friday-start" class="form-control" />
                                            <label class="form-label" for="friday-start">Friday Start</label>
                                            </div>
                                       
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="time" name="friday-end" class="form-control" />
                                            <label class="form-label" for="friday-end">Friday End</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="location" class="form-control" />
                                            <label class="form-label" for="location">Office Location</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg" name="saveOffice">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php
        include('includes/footer.php');
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<?php
include 'header.php';
?>
<main>
    <div class="d-flex justify-content-center ">
        <div class="row w-50 p-3 d-flex justify-content-center ">
            <div class="col-sm-6 login-section-wrapper">

                <div class="login-wrapper my-auto">
                    <h1 class="login-title">Log in</h1>
                    <form method="post" action="../Controllers/register.con.php">
                        <div class="form-group">
                            <label for="email">Full name</label>
                            <input type="text" name="fname" id="email" class="form-control" placeholder="enter your Full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">confirm Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="renter your passsword">
                        </div>
                        <button name="submit" id="login" class="btn btn-block login-btn" value="submit">Submit</button>
                    </form>

                    <p class="login-wrapper-footer-text">You have an account? <a href="login.php" class="text-reset">Login here</a></p>
                </div>
            </div>

        </div>
    </div>
</main>
</body>
</html>

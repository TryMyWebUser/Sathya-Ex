<?php
session_start();
include("config.php");

if (isset($_POST["log-btn"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $checkUserQuery = "SELECT * FROM admin_register WHERE email='$email' AND password='$password'";
    $resultUser = $conn->query($checkUserQuery);

    if ($resultUser->num_rows > 0) {
        $row = $resultUser->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['email_admin'] = $row['email'];
        header("Location: index.php"); 
        exit; 
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }

    $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/icon.png">
    <!-- Bootstrap CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor/LineIcons.min.css" rel="stylesheet">
    <link href="css/vendor/metisMenu.min.css" rel="stylesheet">
    <link href="css/vendor/mm-vertical.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Sathya Groups</title>
</head>
<style>
.error {
    color: red;
    font-size: 12px;
}
</style>

<body>
    <div class="main-content">
        <div class="body-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                    <div class="card m-b-30 no-border">
                        <div class="card-header">
                            <h3 class="card-title text-center">Sign In </h3>
                        </div>
                        <div class="card-body p-t-50 p-b-100 no-padding box-pad">
                            <div class="row">
                                <div class="col-lg-6 mx-auto">
                                    <div class="login-form">
                                        <form method="POST" enctype="multipart/form-data" id="registrationForm">
                                            <div class="mb-4">
                                                <label class="mb-1 text-dark">Email</label>
                                                <input type="email" class="form-control form-control" autocomplete="off"
                                                    placeholder="Email" id="email" name="email" required>
                                                <div class="error" id="emailError"></div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="mb-1 text-dark">Password <i
                                                        class="fas fa-eye toggle-password"
                                                        data-target="#password"></i></label>
                                                <div class="password-wrapper">
                                                    <input type="password" class="form-control" name="password" autocomplete="off"
                                                        id="password" required>

                                                </div>
                                                <div class="error" id="passwordError"></div>
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="mb-4">
                                                    <p>Don not have an account <a href="register.php"
                                                            class="btn-link text-primary">Sign Up</a></p>
                                                </div>
                                                <div class="mb-4">
                                                    <p>Forgot Password <a href="forgot.php"
                                                            class="btn-link text-primary">Change Password</a></p>
                                                </div>
                                            </div>
                                            <div class="text-center mb-4">
                                                <button type="submit" class="btn btn-success btn-block"
                                                    name="log-btn">Sign In</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--JavaScript File -->
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <!--Bootstrap Js -->
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/simple-lightbox.min.js"></script>
    <script src="js/vendor/metisMenu.js"></script>
    <script src="js/custom.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelectorAll('.toggle-password');

        togglePassword.forEach(icon => {
            icon.addEventListener('click', () => {
                const target = document.querySelector(icon.getAttribute('data-target'));
                const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
                target.setAttribute('type', type);
                icon.classList.toggle('fa-eye-slash');
            });
        });
    });
    </script>
</body>

</html>
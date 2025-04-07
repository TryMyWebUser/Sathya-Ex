<?php
include("config.php");

if (isset($_POST["log-btn"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    $checkUserQuery = "SELECT * FROM admin_register WHERE email='$email'";
    $resultUser = $conn->query($checkUserQuery);

    if ($resultUser->num_rows > 0) {
        $updateQuery = "UPDATE admin_register SET password='$password', confirm_password='$confirm_password' WHERE email='$email'";
        if ($conn->query($updateQuery)) {
            echo "<script>
            alert('Password Changed Successfully!');
            window.location.href='Login.php';
            </script>";
            exit;
        } else {
            echo "<script>alert('Failed to update password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid email!');</script>";
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
    <link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor/LineIcons.min.css" rel="stylesheet">
    <link href="css/vendor/metisMenu.min.css" rel="stylesheet">
    <link href="css/vendor/mm-vertical.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Sathya Groups</title>
</head>

<body>
    <div>

        <div class="main-content">


            <div class="body-content">
                <div class="row ">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                        <div class="card m-b-30 no-border">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align:center;">Forgot Password</h3>
                            </div>
                            <div class="card-body no-padding box-pad p-t-50 p-b-50">
                                <div class="row">
                                    <div class="col-lg-6 mx-auto">
                                        <div class="login-form">
                                            <form method="POST" enctype="multipart/form-data" id="registrationForm">
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Email</label>
                                                    <input type="email" class="form-control form-control"
                                                        placeholder="Email" id="email" name="email" required>
                                                    <div class="error" id="emailError"></div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">New Password <i
                                                            class="fas fa-eye toggle-password"
                                                            data-target="#password"></i></label>
                                                    <div class="password-wrapper">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" required>

                                                    </div>
                                                    <div class="error" id="passwordError"></div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Re-type Password <i
                                                            class="fas fa-eye toggle-password"
                                                            data-target="#confirmPassword"></i></label>
                                                    <div class="password-wrapper">
                                                        <input type="password" class="form-control"
                                                            name="confirm_password" id="confirmPassword" required>

                                                    </div>
                                                    <div class="error" id="confirmPasswordError"></div>
                                                </div>


                                                <div class="text-center mb-4">
                                                    <button type="submit" class="btn btn-success btn-block"
                                                        name="log-btn">Sign
                                                        In</button>
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

    </div>

    <!--JavaScript File -->
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/jquery-3.4.0.min.js"></script>
    <!--Bootstrap Js -->
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/simple-lightbox.min.js"></script>
    <script src="js/vendor/metisMenu.js"></script>
    <script src="js/custom.js"></script>
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/demo.js"></script>
    <script>
    $(document).ready(function() {
        $('#registrationForm').submit(function(e) {
            // Reset error messages
            $('.error').html('');

            // Get form values
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();

            if (password.length < 5) {
                $('#passwordError').html('Password must be at least 6 characters long');
                e.preventDefault();
            }

            if (password !== confirmPassword) {
                $('#confirmPasswordError').html('Passwords do not match');
                e.preventDefault();
            }
        });

        function validateEmail(email) {
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailRegex.test(email);
        }
    });
    </script>
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

<!-- Mirrored from preview.enroutedigitallab.com/html/amex/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Feb 2024 07:31:52 GMT -->

</html>
<?php
session_start();
include("config.php");

if (isset($_POST["reg-btn"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    $checkEmailQuery = "SELECT * FROM admin_register WHERE email='$email'";

    $resultEmail = $conn->query($checkEmailQuery);

    if ($resultEmail->num_rows > 0) {
        echo "<script>
            alert('Email already exists!');
            window.location.href = 'register.php';
            </script>";
    } else {

        $sql = "INSERT INTO admin_register (username, email, phone_number, password, confirm_password) VALUES ('$username', '$email','$phone', '$password', '$confirm_password')";

        if ($conn->query($sql)) {
            header("Location: login.php");
        } else {
            
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
<style>
.error {
    color: red;
    font-size: 12px;
}
</style>
<body>
    <div>

        <div class="main-content">


            <div class="body-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                        <div class="card m-b-30 no-border">
                            <div class="card-header">
                                <h3 class="card-title" style="text-align:center;">Register here</h3>
                            </div>
                            <div class="card-body no-padding p-t-50 p-b-50">
                                <div class="row">
                                    <div class="col-lg-6 mx-auto">
                                        <div class="login-form">
                                            <form method="POST" enctype="multipart/form-data" id="registrationForm">
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Username</label>
                                                    <input type="text" class="form-control form-control" autocomplete="off"
                                                        placeholder="Username" id="username" name="username" required>
                                                    <div class="error" id="usernameError"></div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Email</label>
                                                    <input type="email" class="form-control form-control" autocomplete="off"
                                                        placeholder="Email" id="email" name="email" required>
                                                    <div class="error" id="emailError"></div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Phone Number</label>
                                                    <input type="number" class="form-control form-control" autocomplete="off"
                                                        placeholder="Phone Number" id="phone" name="phone" required>
                                                    <div class="error" id="emailError"></div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Password <i
                                                            class="fas fa-eye toggle-password"
                                                            data-target="#password"></i></label>
                                                    <div class="password-wrapper">
                                                        <input type="password" class="form-control" name="password"
                                                            id="password" required>

                                                    </div>
                                                    <div class="error" id="passwordError"></div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="mb-1 text-dark">Confirm Password <i
                                                            class="fas fa-eye toggle-password"
                                                            data-target="#confirmPassword"></i></label>
                                                    <div class="password-wrapper">
                                                        <input type="password" class="form-control"
                                                            name="confirm_password" id="confirmPassword" required>

                                                    </div>
                                                    <div class="error" id="confirmPasswordError"></div>
                                                </div>
                                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                    <div class="mb-4">
                                                        <p>Already have an account <a href="login.php"
                                                                class="btn-link text-primary">Login in</a></p>
                                                    </div>
                                                </div>
                                                <div class="text-center mb-4">
                                                    <button type="submit" class="btn btn-success btn-block"
                                                        name="reg-btn">Sign
                                                        Up</button>
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
            var phone = $('#phoneNumber').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();

            // Validation logic
            if (username.length < 3 || !/^[a-zA-Z\s]+$/.test(username)) {
                $('#usernameError').html(
                    'Username must be at least 3 characters long and can contain only alphabets and spaces'
                );
                e.preventDefault();
            }

            if (!validateEmail(email)) {
                $('#emailError').html('Please enter a valid email address');
                e.preventDefault();
            }

            if (password.length < 6) { // Corrected to match the error message
                $('#passwordError').html(
                    'Password must be at least 6 characters long'
                    ); // Corrected to match the error message
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

</html>
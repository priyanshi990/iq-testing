<?php
    session_start();
        $con = mysqli_connect("localhost", "root", "", "test");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $invalid_login = false;
        if (isset($_POST["log"])) {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $ins = mysqli_query($con, "SELECT * FROM free WHERE EMAIL = '$email' AND Password = '$pass'");
            if (mysqli_num_rows($ins) > 0) {
                session_start();
                $_SESSION['email'] = $email;
                echo("<script>alert('User found successfully!!')</script>");
                header("Location: http://localhost/proskillmind1/ques.php");
                exit();
            } else {
                $invalid_login = true;
            }
        }
    ?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test Login</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("images/pp.jpg");
            background-size: cover;
            padding-top: 50px;
            font-family: "Century Schoolbook", sans-serif;
        }
        .container {
            max-width: 500px;
            margin: auto;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }
        .aks {
            font-size: 50px;
            font-weight: bold;
            text-align: center;
        }
        .btn-custom {
            background: linear-gradient(to right, #e65100, #f9a825);
            color: white;
            font-size: 18px;
            border-radius: 50px;
            width: 100%;
        }
        .btn-custom:hover {
            background: linear-gradient(to right, #1e4b7a, #6aa9e1);
        }
        .error-message {
            color: red;
            font-size: 14px;
        }
        .home-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #1e4b7a;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border: 2px solid #ffffff;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .home-btn:hover {
            background-color: #e65100;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
<a href="i.php" class="home-btn">&larr; Home</a>
    <div class="container">
        <div class="form-container">
            <div class="aks">
                <img src="images/logo.png" height="75px" alt="IQ Logo">
            </div>
            <center><i><b>- To know your IQ / To start test, you need to log in -</b></i></center><br>
            <form action="" method="post" id="loginForm">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Registered Email ID" pattern="[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook|hotmail|icloud|protonmail)\.(com|org|net|edu)">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password" id="passwordInput">
                        <div class="input-group-append">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">👁️</span>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="log" value="Log In" class="btn btn-custom">
                </div>
                <div class="form-group text-center">
                    <button type="button" onclick="window.location.href='p3.php'" class="btn btn-custom">Sign Up</button>
                </div>
                <div class="form-group text-center">
                    <i><b>New user? Click to register yourself</b></i>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('passwordInput');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
        <?php if ($invalid_login): ?>
            alert("Invalid email or password. Please try again.");
        <?php endif; ?>
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSkill Mind- Sign In / Register</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url("images/login.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .container {
            display: flex;
            max-width: 950px;
            width: 100%;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .left-side {
            background: url('images/7.jfif') no-repeat center center/cover;
            flex: 1;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            text-align: center;
        }

        .left-side .header img {
            width: 100px;
            margin-bottom: 20px;
        }

        .left-side h2 {
            font-size: 34px;
            font-weight: bold;
            margin-bottom: 10px;
            color: black;
        }

        .left-side p {
            font-size: 16px;
            color: black;
            margin-bottom: 30px;
        }

        .right-side {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right-side h3 {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group input {
            height: 50px;
            font-size: 16px;
            border-radius: 8px;
            padding-left: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            box-shadow: 0 8px 15px rgba(0, 91, 187, 0.3);
        }

        .toggle-auth {
            font-size: 14px;
            margin-top: 20px;
            color: #007bff;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="header">
                <img src="images/logo.png" alt="MindMasterIQ Logo">
            </div>
            <h2>Welcome to ProSkill Mind</h2>
            <p>Start your journey to unlock your true potential with our IQ test and insights.</p>
        </div>
        <div class="right-side">
            <div id="signInHeader">
                <h3>Sign In</h3>
            </div>
            <form id="loginForm" onsubmit="return handleLogin();">
                <input type="hidden" name="actionType" value="login">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required
                        pattern="[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook|hotmail|icloud|protonmail)\.(com|org|net|edu)">
                </div>
                <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-custom">Sign In</button>
            </form>
            <div id="toggleRegisterLink" class="toggle-auth" onclick="toggleForms()">Don't have an account? Register
            </div>
            <div id="registerContainer" style="display: none;">
                <div id="registerHeader">
                    <h3>Register</h3>
                </div>
                <form id="registerForm" onsubmit="return handleRegistration();">
                    <input type="hidden" name="actionType" value="register">
                    <div class="form-group">
                        <input type="text" name="firstName" placeholder="First Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">I agree to the <a href="#">Terms of Service</a></label>
                    </div>
                    <button type="submit" class="btn btn-custom">Register</button>
                </form>
                <div id="toggleSignInLink" class="toggle-auth" onclick="toggleForms()">Already have an account? Sign In
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleForms() {
            const loginForm = document.getElementById("loginForm");
            const registerContainer = document.getElementById("registerContainer");
            const signInHeader = document.getElementById("signInHeader");
            const registerHeader = document.getElementById("registerHeader");
            const toggleRegisterLink = document.getElementById("toggleRegisterLink");
            const toggleSignInLink = document.getElementById("toggleSignInLink");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                signInHeader.style.display = "block";
                toggleRegisterLink.style.display = "block";
                registerContainer.style.display = "none";
                registerHeader.style.display = "none";
                toggleSignInLink.style.display = "none";
            } else {
                loginForm.style.display = "none";
                signInHeader.style.display = "none";
                toggleRegisterLink.style.display = "none";
                registerContainer.style.display = "block";
                registerHeader.style.display = "block";
                toggleSignInLink.style.display = "block";
            }
        }
        function handleLogin() {
            const form = document.getElementById("loginForm");
            if (form.checkValidity()) {
                $.ajax({
                    url: 'login.php',
                    type: 'POST',
                    data: $('#loginForm').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            window.location.href = response.redirect;
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert("An error occurred while processing the login.");
                    }
                });
            } else {
                alert("Please enter valid details.");
            }

            return false;
        }

        async function handleRegistration() {
            const formData = new FormData(document.getElementById("registerForm"));
            try {
                const response = await fetch('registration.php', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    console.error("Network response was not ok:", response.statusText);
                    alert("There was a problem with the registration request.");
                    return;
                }
                const data = await response.json();
                console.log("Registration response data:", data);
                if (data.status && data.message) {
                    alert(data.message);
                    if (data.status === 'success') {

                    }
                } else {
                    console.error("Unexpected response format:", data);
                    alert("Unexpected response format. Please check the server code.");
                }
            } catch (error) {
                console.error("Error occurred during registration:", error);
                alert("An error occurred during registration. Please try again later.");
            }
            return false;
        }
    </script>
</body>
</html>
<?php
$con = mysqli_connect("localhost", "root", "", "test");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST["log"])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query = "SELECT q1, q2, q3 FROM free WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($con, $query);
    $correctAnswers = 0;

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['q1'] == '6')
            $correctAnswers++;
        if ($row['q2'] == '36')
            $correctAnswers++;
        if ($row['q3'] == '15')
            $correctAnswers++;
        header("Location: http://localhost/proskillmind1/result.php ?email=$email&correctAnswers=$correctAnswers");
        exit();
    } else {
        echo "<script>alert(Invalid login credentials)</script>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Result</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("images/a3.webp");
            background-size: cover;
            background-position: center;
            padding-top: 20px;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background: linear-gradient(180deg, #7EC8E3, #A9DDF5);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .aks {
            text-align: center;
            font-size: 70px;
            font-weight: bold;
            font-family: 'Lucida Handwriting', cursive;
            color: #1e4b7a;
        }

        .cha {
            font-family: 'Stencil', sans-serif;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            color: #1e4b7a;
        }

        .form-control {
            border-radius: 30px;
            background-color: #f1f1f1;
            color: #333;
        }

        .form-control::placeholder {
            color: grey;
        }

        .btn-custom {
            background: linear-gradient(to right, #1e4b7a, #6aa9e1);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 30px;
            width: 100%;
            transition: all 0.3s ease-in-out;
            margin-top: 15px;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #f9a825, #e65100);
            transform: scale(1.05);
            color: white;
        }

        .text-center a {
            color: #1e4b7a;
        }

        #spinner {
            display: none;
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="aks"><img src="images/logo.png" height="75px" width="75px" alt="IQ Logo"></div>
                        <br>
                        <div class="cha">Result</div>
                        <br>
                        <form id="resultForm" method="post">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Registered Email ID"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="log" class="btn btn-custom">Log In</button>
                            </div>
                            <div class="text-center">
                                <a href="http://localhost/testing/frgt.php" class="text-dark">Forgot Password? (click
                                    here to continue)</a>
                            </div>
                        </form>
                        <div id="spinner" class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        <?php if ($invalidLogin): ?>
            alert("Invalid login credentials. Please check your email and password.");
        <?php endif; ?>
        document.getElementById('resultForm').addEventListener('submit', function () {
            document.getElementById('spinner').style.display = 'block';
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
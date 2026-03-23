<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Form</title>
    <link rel="icon" href="images/logo.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("images/kk.avif");
            background-size: cover;
            background-attachment: fixed;
            padding-top: 50px;
            color: #ffffff;
        }

        .container {
            max-width: 500px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            background: linear-gradient(180deg, #7EC8E3, #A9DDF5);
            margin-top: 30px;
        }

        .aks {
            text-align: center;
            font-size: 24px;
            font-family: 'Lucida Handwriting', cursive;
            color: #1e4b7a;
        }

        .aks img {
            width: 100px;
        }

        .cha {
            font-family: 'Stencil', serif;
            text-align: center;
            font-size: 30px;
            color: #1e4b7a;
        }

        .xyz .form-control {
            height: 45px;
            font-size: 16px;
            border-radius: 25px;
            background-color: #f1f1f1;
            border: none;
            padding: 10px;
            transition: box-shadow 0.3s ease;
        }

        .xyz .form-control:focus {
            box-shadow: 0 0 10px #7EC8E3;
        }

        .btn-custom {
            height: 45px;
            font-size: 18px;
            width: 100%;
            border-radius: 25px;
            background: linear-gradient(to right, #1e4b7a, #6aa9e1);
            color: white;
            font-family: 'Lucida Handwriting', cursive;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #e65100;
            transform: scale(1.05);
            color: white;
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
        <form action="" method="post">
            <div class="aks">
                <img src="images/logo.png" alt="IQ Logo">
                Elevate Your Thinking, Enhance Your Skills
            </div>
            <br>
            <div class="cha">SIGN UP</div><br>
            <div class="form-group xyz">
                <input type="text" name="first" placeholder="-Enter First Name-" class="form-control" required>
            </div>
            <div class="form-group xyz">
                <input type="text" name="last" placeholder="-Enter Last Name-" class="form-control" required>
            </div>
            <div class="form-group xyz">
                <input type="email" name="email" placeholder="-Enter Email-" class="form-control" required pattern="[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook|hotmail|icloud|protonmail)\.(com|org|net|edu)">
            </div>
            <div class="form-group xyz">
                <input type="password" name="pass" placeholder="-Enter Password-" class="form-control" required>
            </div>
            <div class="form-group xyz">
                <input type="submit" name="getit" value="SIGN UP" class="btn btn-custom">
            </div>
        </form>
        <br>
        <div class="form-group xyz">
            <input type="button" name="log" value="START TEST" class="btn btn-custom" onclick="startTest()">
        </div>
    </div>
    <?php
    if (isset($_POST["log"])) {
        header("Location: http://localhost/proskillmind/p2.php");
        exit();
    }
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST["getit"])) {
        $first = $_POST["first"];
        $last = $_POST["last"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $ins = mysqli_query($con, "INSERT INTO free (first, last, Email, Password) VALUES ('$first', '$last', '$email', '$pass')");

        if ($ins) {
            echo "<script>alert('YOU HAVE BEEN SUCCESSFULLY REGISTERED, PLEASE CLICK ON START TEST TO CONTINUE')</script>";
        } else {
            echo "<script>alert('Error in record..! Sorry')</script>";
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function startTest() {
            alert("Thank you for signing up. Please log in to start the test!");
            window.location.href = "http://localhost/proskillmind/p2.php";
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Block</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/pp.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding-top: 80px;
            color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            text-align: center;
            font-size: 38px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .form-container {
            background-color: rgba(28, 120, 200, 1);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: white;
        }

        .form-group input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 25px;
            padding: 10px 15px;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease-in-out;
        }

        .form-group input:focus {
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 10px rgba(20, 50, 100, 0.8);
            outline: none;
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            background: linear-gradient(45deg, #004ba0, #006dc4);
            color: #fff;
            border: none;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #e65100, #ff8f00);
            transform: scale(1.05);
        }

        .error-message {
            color: #ff4d4d;
            text-align: center;
            font-size: 16px;
            margin-top: 15px;
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
    <?php
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $error_message = '';
    if (isset($_POST['log'])) {
        $id = $_POST['id'];
        $pass1 = $_POST['pass1'];
        $query = "SELECT * FROM admin WHERE admin_id='$id' AND PASSWORD='$pass1'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            header("location:adminprem.php");
            exit();
        } else {
            $error_message = "Invalid ID or Password. Please try again.";
        }
    }
    ?>
    <a href="i.php" class="home-btn">&larr; Home</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="logo">
                    <img src="images/logo.png" alt="IQ Logo" height="90px" width="90px">
                </div>
                <div class="title">Administrator Sign In</div>
                <form method="post" class="form-container">
                    <div class="form-group">
                        <input type="text" name="id" placeholder="Enter ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass1" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" name="log" class="btn btn-custom">Sign In</button>
                    <?php if ($error_message): ?>
                        <div class="error-message"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
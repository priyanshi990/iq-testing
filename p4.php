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
            background-image: url("images/pp.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            padding-top: 50px;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background-color: rgba(68, 160, 230, 0.85);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            color: white;
            max-width: 600px;
            margin: auto;
        }
        .aks {
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            font-family: 'Lucida Handwriting', cursive;
            color: #ffffff;
        }
        
        .cha {
            font-family: 'Stencil', serif;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            color: #ffffff;
        }
        .form-control {
            height: 45px;
            border-radius: 25px;
            background-color: #f1f1f1;
            color: #333;
            font-size: 16px;
        }

        .form-control::placeholder {
            color: #888;
        }

        .btn-custom {
            height: 45px;
            font-size: 18px;
            width: 100%;
            border-radius: 25px;
            background: linear-gradient(to right, #e65100, #f9a825);
            color: white;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #1e4b7a, #6aa9e1);
            transform: scale(1.05);
        }
        .error-message {
            color: #ff4c4c;
            font-size: 14px;
            margin-top: 5px;
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
                <img src="images/logo.png" height="75px" width="90px" alt="IQ Logo"><br>
                Administrator Block
            </div>
            <br>
            <form method="post">
                <div class="form-group mb-3">
                    <input type="text" name="id" placeholder="- Enter ID -" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="pass1" placeholder="- Password -" class="form-control" required>
                </div>
                <div class="form-group text-center mb-3">
                    <input type="submit" name="log" value="Log In" class="btn btn-custom">
                </div>
            </form>
        </div>
    </div>
    <script>
        document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

        <?php if (isset($_POST['log']) && mysqli_num_rows($result) == 0): ?>
            alert("Invalid credentials, please try again.");
        <?php endif; ?>
    </script>
</body>
</html>

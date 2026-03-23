<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'test'); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id']; 
$sql = "SELECT r.first_name, r.last_name, rs.date FROM register r JOIN result rs ON r.user_id = rs.user_id WHERE r.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $date);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Achievement</title>
    <link rel="icon" href="images/logo.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9f5fb; /* Light blue background */
            text-align: center;
            padding-top: 50px;
        }

        .certificate {
            width: 600px;  
            height: 450px;
            border: 10px solid #1e88e5; 
            padding: 20px;
            margin: auto;
            background-color: #ffffff; 
            position: relative;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2); 
            border-radius: 20px; 
            overflow: hidden; 
        }

        .certificate::before {
            content: '★ ★ ★ ★ ★'; 
            font-size: 40px; 
            color: #ff9800; 
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            letter-spacing: 10px;
        }

        .certificate h1 {
            font-size: 36px; 
            color: #1e88e5;
            margin-bottom: 10px;
            font-family: 'Georgia', serif;
            letter-spacing: 2px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .certificate p {
            font-size: 18px; 
            margin: 10px 0;
            color: #333333;
            line-height: 1.6;
        }

        .certificate .name {
            font-size: 28px; 
            font-weight: bold;
            margin: 15px 0;
            color: #d32f2f; 
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .certificate .appreciation {
            font-size: 16px; 
            font-style: italic;
            margin: 15px 0;
            color: #666666;
        }

        .certificate .footer {
            font-size: 14px; 
            margin-top: 20px;
            color: #1e88e5;
        }

        .certificate::after {
            content: '★ ★ ★ ★ ★ ★ ★ ★ ';
            color: #ff9800;
            font-size: 25px; 
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            letter-spacing: 6px;
        }

        .certificate .signature {
            font-size: 16px; 
            margin-top: 20px;
            color: #333333;
            font-family: 'Cursive', serif;
            text-align: right;
            padding-right: 40px;
        }
        .download-button {
            margin-top: 20px;  
            padding: 12px 25px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .download-button:hover {
            background-color: #3498db;
        }

        .certificate .logo {
        position: absolute;
        top: 20px;   
        left: 20px;  
        max-width: 80px;  
        max-height: 80px;
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
    <div class="certificate">
        <img src="images/logo.png" alt="Logo" class="logo"> 
        <h1>Certificate <br>of<br> Achievement</h1>
        <p>This is to proudly certify that</p>
        <p class="name"><?php echo $first_name . ' ' . $last_name; ?></p> 
        <p>has successfully completed the IQ Test with outstanding performance.</p>
        <p class="appreciation">We appreciate your dedication and hard work!</p>
        <p class="footer">Awarded on <?php echo $date; ?></p>
    </div>
    <button class="download-button" onclick="window.print()">Download Certificate</button> 
</body>
</html>

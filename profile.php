<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You are not logged in! Redirecting to home...'); window.location.href='i.php';</script>";
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "test"; 
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_id = $_SESSION['user_id'];
$userQuery = "SELECT first_name, last_name FROM register WHERE user_id='$user_id'";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();
$resultQuery = "SELECT score, grade, test_type FROM result WHERE user_id='$user_id'";
$resultResult = $conn->query($resultQuery);
$resultData = $resultResult->fetch_assoc();
$username = $userData['first_name'] . ' ' . $userData['last_name'];
$iqScore = $resultData['score'];
$grade = $resultData['grade'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="icon" href="images/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            margin: 0;
            height: 100vh;
            background-color: #f0f2f5; /* Light background */
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #2C3E50;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar img {
            width: 100px;
            margin-bottom: 20px;
        }
        .sidebar button {
            background-color: #E74C3C;
            border: none;
            color: #fff;
            padding: 10px 20px;
            margin: 5px 0;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s;
            border-radius: 5px;
            font-size: 16px;
        }
        .sidebar button:hover {
            background-color: #FF5733;
        }
        .profile-content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f9f9f9;
            overflow-y: auto;
        }
        .info-section {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .info-section h2 {
            margin-top: 0;
        }
        .charts-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        canvas {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            height: 350px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="images/11.png" alt="Company Logo">
        <button onclick="window.location.href='instructions.php'">Logout</button>
        <button onclick="window.location.href='result1.php'">View Result</button>
        <button onclick="window.location.href='i.php'">Home</button>
    </div>

    <div class="profile-content">
        <div class="info-section">
            <h2>Welcome, <?php echo $username; ?></h2>
            <p>User ID: <?php echo $_SESSION['user_id']; ?></p>
            <p>Grade: <?php echo $grade; ?></p>
        </div>

        <div class="charts-container">
            <canvas id="progressChart"></canvas>
            <canvas id="performanceChart"></canvas>
        </div>
    </div>

    <script>
        const progressCtx = document.getElementById('progressChart').getContext('2d');
        new Chart(progressCtx, {
            type: 'line',
            data: {
                labels: ['Test 1', 'Test 2', 'Test 3', 'Test 4'],
                datasets: [{
                    label: 'Progress Tracker',
                    data: [65, 70, 85, 90],
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    fill: true
                }]
            },
            options: {
                scales: {
                    x: { ticks: { color: 'black' } },
                    y: { ticks: { color: 'black' } }
                }
            }
        });

        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        new Chart(performanceCtx, {
            type: 'bar',
            data: {
                labels: ['Logic Test', 'Memory Test', 'Math Test', 'Verbal Test'],
                datasets: [{
                    label: 'Performance Analysis',
                    data: [90, 60, 70, 85],
                    backgroundColor: ['#4CAF50', '#FF9800', '#03A9F4', '#F44336']
                }]
            },
            options: {
                scales: {
                    x: { ticks: { color: 'black' } },
                    y: { ticks: { color: 'black' } }
                }
            }
        });
    </script>
</body>
</html>

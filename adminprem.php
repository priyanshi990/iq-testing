<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
    header('Content-Type: application/json');
}
$user_count_query = "SELECT COUNT(*) AS total_users FROM register";
$user_count_result = $conn->query($user_count_query);
$user_count = $user_count_result->fetch_assoc()['total_users'];

$test_count_query = "SELECT COUNT(*) AS total_tests FROM question";
$test_count_result = $conn->query($test_count_query);
$test_count = $test_count_result->fetch_assoc()['total_tests'];

$result_count_query = "SELECT COUNT(*) AS total_results FROM result";
$result_count_result = $conn->query($result_count_query);
$result_count = $result_count_result->fetch_assoc()['total_results'];
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #1e1e2f;
            color: white;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #25253b;
            padding-top: 20px;
            position: fixed;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.5);
        }
        .sidebar ul {
            list-style-type: none;
        }
        .sidebar ul li {
            margin: 20px 0;
            text-align: center;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #353567;
            border-radius: 8px;
        }
        .content {
            margin-left: 250px;
            padding: 40px;
            width: 100%;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #f39c12;
        }

        .header h1 {
            font-size: 2.5em;
        }

        .dashboard {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat-card {
            background-color: #32324e;
            width: 30%;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #f39c12;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }

        .stat-card h3 {
            font-size: 1.5em;
            color: #fff;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 2.5em;
        }
        button {
            padding: 10px 15px;
            background-color: #f39c12;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e67e22;
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="adminprem.php">Dashboard</a></li>
            <li><a href="manage_users.php">Users</a></li>
            <li><a href="manage_tests.php">Questions</a></li>
            <li><a href="view_result_details.php">Results</a></li>
            <li><a href="i.php">Home</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="dashboard">
            <div class="stat-card">
                <h3>Users</h3>
                <p><?php echo $user_count; ?></p> 
            </div>
            <div class="stat-card">
                <h3>Questions</h3>
                <p><?php echo $test_count; ?></p> 
            </div>
            <div class="stat-card">
                <h3>Results</h3>
                <p><?php echo $result_count; ?></p> 
            </div>
        </div>
</body>
</html>
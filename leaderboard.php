<?php
session_start(); 
$con = mysqli_connect("localhost", "root", "", "test");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT r.user_id, SUM(r.score) AS total_score, reg.first_name
          FROM result r
          JOIN register reg ON r.user_id = reg.user_id
          GROUP BY r.user_id
          ORDER BY total_score DESC";
$result = mysqli_query($con, $query);
$rank = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1c1f26, #2d313a);
            color: #fff;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fcd116;
            text-shadow: 2px 2px #000;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
            backdrop-filter: blur(8px);
        }

        .badge-container {
            position: relative;
            display: inline-block;
        }

        .badge-light {
            cursor: pointer;
            font-size: 18px;
            padding: 5px 10px;
            border-radius: 10px;
        }

        .badge-message {
            display: none;
            position: absolute;
            top: 40px;
            left: 0;
            background: #fff;
            color: #000;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 13px;
            z-index: 10;
            box-shadow: 0 0 8px rgba(0,0,0,0.3);
        }

        .badge-container:hover .badge-message {
            display: block;
        }

        .btn-upgrade {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-upgrade:hover {
            background-color: #218838;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
        }

        .upgrade-btn {
            text-align: center;
            margin-top: 40px;
        }

        .table th, .table td {
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
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
            color :white;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <a href="i.php" class="home-btn">&larr; Home</a>
    <img src="images/logo.png" height="75" class="logo" alt="Logo">
    <h1>Choose Your Path to Unlock Potential</h1>
    <h1>Leaderboard</h1>

    <div class="container table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($_SESSION['user_id']) && $row['user_id'] == $_SESSION['user_id']) {
                        $_SESSION['ranking'] = $rank;
                    }

                    echo "<tr>
                            <td>{$rank}</td>
                            <td>{$row['user_id']}</td>
                            <td>{$row['first_name']}</td>
                            <td class='badge-container'>{$row['total_score']}
                                <span class='badge badge-light ml-2'>🏆
                                    <span class='badge-message'>Sweet score!</span>
                                </span>
                            </td>
                          </tr>";
                    $rank++;
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <div class="upgrade-btn">
        <a href="instructions.php">
            <button class="btn-upgrade">Upgrade to Premium to Access Leaderboard</button>
        </a>
    </div>
</body>
</html>

<?php
$host = 'localhost'; 
$db = 'test'; 
$user = 'root'; 
$password = ''; 
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : null;
if (!$email) {
    echo "<p>Error: No email provided. Please provide a valid email to view results.</p>";
    exit;
}
$correctAnswers = 0;
$grade = 'N/A';
$totalScore = 0;
$sql = "SELECT q1, q2, q3, q4, q5,q6,q7,q8,q9,q10 FROM free WHERE email = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$correctAnswersArray = [32, 'Pacific', 'Unknown', 'Triangle', 9, '5 minutes', 'P', 'Nine', 'Nowhere', 'They’re all married']; 

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    foreach ($correctAnswersArray as $index => $correctAnswer) {
        $userAnswer = trim(strval($row['q' . ($index + 1)])); 
        $correctAnswer = trim(strval($correctAnswer)); 
        if ($userAnswer === $correctAnswer) {
            $correctAnswers++;
        }
    }
    $totalQuestions = count($correctAnswersArray); 
    $totalScore = ($correctAnswers / $totalQuestions) * 100;
    if ($totalScore >= 90) {
        $grade = 'A';
    } elseif ($totalScore >= 75) {
        $grade = 'B';
    } elseif ($totalScore >= 60) {
        $grade = 'C';
    } elseif ($totalScore >= 50) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }
    $updateSql = "UPDATE free SET  score = ?, grade = ? WHERE email = ?";
    $updateStmt = $conn->prepare($updateSql);
    if (!$updateStmt) {
        die("Error preparing update statement: " . $conn->error);
    }
    $updateStmt->bind_param('dss', $totalScore, $grade, $email);
    if (!$updateStmt->execute()) {
        die("Error executing update statement: " . $updateStmt->error);
    }
    $updateStmt->close(); 
} else {
    echo "<p>No results found for this email.</p>";
    exit;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>User Profile</title>
    <link rel="icon" href="images/logo.png">
    <style>
        body {
            background-image: url("images/p14.jpg");
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #007bff;
        }

        .card-text {
            font-size: 1.1em;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
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
    <div class="container mt-5">
        <h1 class="text-center">Result</h1>
        <div class="card mt-3">
            <div class="card-body">
                <div class="aks">
                    <img src="images/logo.png" height="75px" width="90px" alt="IQ Logo">
                </div>
                <h3 class="card-title">Welcome, <?php echo htmlspecialchars($email); ?></h3>
                <p class="card-text">Here is your performance:</p>
                <canvas id="performanceChart" style="max-width: 400px; max-height: 400px; margin: 0 auto;"></canvas>
                <div class="mt-4">
                    <h4>Performance Details</h4>
                    <p>Correct Answers: <?php echo $correctAnswers; ?></p>
                    <p>Incorrect Answers: <?php echo $totalQuestions - $correctAnswers; ?></p>
                    <p>Total Questions: <?php echo $totalQuestions; ?></p>
                    <p>Total Score: <?php echo number_format($totalScore, 2); ?>%</p>
                    <p>Grade: <?php echo $grade; ?></p>
                    <p>Remark: <?php echo ($correctAnswers >= 3) ? 'Good job!' : 'Needs improvement.'; ?></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const correctAnswers = <?php echo $correctAnswers; ?>;
        const incorrectAnswers = <?php echo $totalQuestions - $correctAnswers; ?>;
        const totalQuestions = <?php echo $totalQuestions; ?>;
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Correct Answers', 'Incorrect Answers'],
                datasets: [{
                    label: 'Number of Answers',
                    data: [correctAnswers, incorrectAnswers],
                    backgroundColor: ['#4CAF50', '#F44336'], 
                    borderColor: ['#3e95cd'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Answers'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Performance Overview'
                    }
                }
            }
        });

        document.querySelector('.toggle-nav').addEventListener('click', function () {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

    </script>
</body>

</html>
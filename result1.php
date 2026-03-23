<?php
session_start();

// Database connection details
$host = "localhost";
$dbname = "test";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume user_id is stored in the session after login
$user_id = $_SESSION['user_id'];

// Fetch total correct answers directly from the database
$query = "SELECT SUM(score) AS total_score FROM result WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$correct_answers = $row['total_score'] ?? 0;

// Calculate the percentage
$total_questions = 25; // Assuming 25 questions in total
$percentage_score = ($correct_answers / $total_questions) * 100;

if ($percentage_score >= 90) {
    $grade = 'A+';
} elseif ($percentage_score >= 75) {
    $grade = 'A';
} elseif ($percentage_score >= 60) {
    $grade = 'B';
} elseif ($percentage_score >= 45) {
    $grade = 'C';
} else {
    $grade = 'D';
}

// IQ Level
$iq_level = ($percentage_score >= 90) ? "Exceptional Genius (IQ: 140+)" :
           (($percentage_score >= 75) ? "Highly Intelligent (IQ: 120-139)" :
           (($percentage_score >= 60) ? "Above Average (IQ: 100-119)" :
           (($percentage_score >= 45) ? "Average (IQ: 90-99)" : "Below Average (IQ: <90)")));

// Badge Assignment
if ($grade == 'A+') {
    $badge = 'Gold - Legendary Genius';
    $badge_image = 'images/gold-badge.jpg';
} elseif ($grade == 'A') {
    $badge = 'Silver - Mastermind';
    $badge_image = 'images/silver_badge.jpg';
} elseif ($grade == 'B') {
    $badge = 'Bronze - Intellectual Pro';
    $badge_image = 'images/bronze_badge.jpg';
}elseif ($grade == 'C') {
    $badge = 'Iron - Brain Booster';
    $badge_image = 'images/iron.jpeg';
}else {
    $badge = 'Participant - Learner’s Spirit';
    $badge_image = 'images/participant.jpeg';
}


// Provide strengths, weaknesses, and exercise suggestions based on score
if ($correct_answers >= 17) {
    $strengths = "You demonstrate exceptional problem-solving abilities, critical thinking, and logical reasoning. 
    Your quick decision-making under time constraints is a testament to your high cognitive abilities. 
    You can easily grasp complex concepts and apply them effectively.";
    $weaknesses = "Although your performance is outstanding, 
    you may find yourself at times focused more on speed rather than revisiting and optimizing solutions. 
    A little more patience and attention to detail could make your answers even more refined.";
    $exercise_suggestion = "To continue challenging yourself, engage with complex puzzles and logic games.
     Work on tasks that require both time management and strategic thinking, 
    such as real-time problem-solving challenges or strategy-based games that require predicting multiple outcomes.";
} elseif ($correct_answers >= 13) {
    $strengths = " Your analytical skills and ability to approach problems methodically are excellent. 
    You consistently exhibit strong attention to detail and maintain a good understanding of logical concepts.";
    $weaknesses = "Sometimes, pressure or multitasking could affect the consistency of your responses.
     You may benefit from practicing balancing multiple tasks or managing distractions while solving problems.";
    $exercise_suggestion = "To strengthen your skills further, try practicing timed challenges with multi-step reasoning. 
    Focus on improving your adaptability to change or unexpected complications in problems. 
    Puzzles with varying levels of difficulty can enhance your critical thinking and multitasking abilities.";
} elseif ($correct_answers >= 10) {
    $strengths = "You show a solid grasp of problem-solving techniques and are able to handle medium-level challenges effectively. 
    Your ability to break down tasks into smaller, manageable parts is a great asset.";
    $weaknesses = "At times, you may struggle with staying focused during more complex or time-sensitive tasks. 
    Developing strategies for maintaining concentration in these scenarios can be beneficial.";
    $exercise_suggestion = "Focus on practicing problems under timed conditions. 
    Start with puzzles or games that test both speed and accuracy.
     Engaging in exercises that require you to think quickly under pressure will improve your performance in high-stakes situations.";
} else {
    $strengths = "You have a basic understanding of problem-solving, and you're not afraid to tackle challenges. 
    Your willingness to engage with new types of problems is commendable..";
    $weaknesses = "There may be difficulty in focusing under pressure, or you may need to improve your logical reasoning skills.
     Strengthening these areas will be key to improving your performance.";
    $exercise_suggestion = "Start with easier puzzles and gradually increase the complexity as you build confidence.
     Practice focusing on one problem at a time, and develop a methodical approach to tackling challenges. 
    Focusing on basic logic exercises and practicing concentration techniques will help improve both speed and accuracy over time.";
}

// Update grade in the database
$update_query = "UPDATE result SET grade = ? WHERE user_id = ?";
$update_stmt = $conn->prepare($update_query);
$update_stmt->bind_param("si", $grade, $user_id);
$update_stmt->execute();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="icon" href="images/logo.png">
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(120deg, #3e5151, #decba4);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .sidebar {
            width: 300px;
            padding: 20px;
            text-align: center;
            background-color: rgba(20, 30, 30, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar img {
            width: 120px;
            height: auto;
        }

        #tagline {
            font-size: 22px;
            background-color: #333;
            color: #fff;
            font-weight: bold;
            margin-top: 15px;
        }

        .result-container {
            flex-grow: 1;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            overflow-y: auto;
        }

        h1 {
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .badge img {
            width: 100px;
            height: 100px;
            margin-top: 15px;
        }

        .graph-container {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        canvas {
            width: 250px !important;
            height: 250px !important;
        }

        .iq-level, .strengths, .weaknesses, .exercise {
            font-size: 18px;
            color: #2c3e50;
            margin-top: 20px;
            text-align: left;
        }

        .certificate-button {
            margin-top: 30px;
            padding: 12px 30px;
            background-color: #ffa500;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
        }

        .certificate-button:hover {
            background-color: #ff8700;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
    <div class="sidebar">
    
        <img src="images/logo.png" alt="Logo">
        <div id="tagline">Choose Your Path to Unlock Potential</div>
        <a href="i.php">Home</a>
    </div>

    <div class="result-container">
        <h1>Your Result</h1>
        <p>Your Score: <?php echo $correct_answers; ?> / <?php echo $total_questions; ?></p>
        <p>Your Grade: <?php echo $grade; ?></p>
        <p>Correct Answers: <?php echo $correct_answers; ?> out of <?php echo $total_questions; ?></p>
        <p>Percentage: <?php echo $percentage_score; ?></p>

        <div class="badge">
            <p>Congratulations! You earned a <?php echo $badge; ?>!</p>
            <img src="<?php echo $badge_image; ?>" alt="badge">
        </div>

        <div class="graph-container">
            <canvas id="scoreBarChart"></canvas>
            <canvas id="scorePieChart"></canvas>
            <canvas id="scoreRadarChart"></canvas>
        </div>

        <div class="iq-level">
            <h3>IQ Level:</h3>
            <p><?php echo $iq_level; ?></p>
        </div>

        <div class="strengths">
            <h3>Strengths:</h3>
            <p><?php echo $strengths; ?></p>
        </div>

        <div class="weaknesses">
            <h3>Weaknesses:</h3>
            <p><?php echo $weaknesses; ?></p>
        </div>

        <div class="exercise">
            <h3>Suggested Exercises:</h3>
            <p><?php echo $exercise_suggestion; ?></p>
        </div>
        <br><br>

        <a href="certificate.php" class="certificate-button">View Sample Certificate</a>
    </div>
</div>

<script>
window.onload = function() {
    // Bar Chart
    var ctx = document.getElementById('scoreBarChart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Score', 'Total Questions'],
            datasets: [{
                label: 'Performance',
                data: [<?php echo $correct_answers; ?>, <?php echo $total_questions; ?>],
                backgroundColor: ['#2ecc71', '#3498db'],
                borderColor: '#1e8449',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 1500,
                easing: 'easeOutBounce'
            },
            plugins: {
                legend: {
                    labels: { color: 'black' }
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: '#fff',
                    titleColor: '#000',
                    bodyColor: '#000',
                    borderColor: '#2ecc71',
                    borderWidth: 2
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: 'black' }
                },
                x: {
                    ticks: { color: 'black' }
                }
            }
        }
    });

    // Pie Chart
    var ctxPie = document.getElementById('scorePieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Correct', 'Incorrect'],
            datasets: [{
                data: [<?php echo $correct_answers; ?>, <?php echo ($total_questions - $correct_answers); ?>],
                backgroundColor: ['#FFB6C1', '#F1E050'],
                borderColor: '#000',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            animation: {
                animateRotate: true,
                animateScale: true
            },
            plugins: {
                legend: {
                    labels: { color: 'black' }
                },
                tooltip: {
                    backgroundColor: '#fff',
                    titleColor: '#000',
                    bodyColor: '#000',
                    borderColor: '#FFB6C1',
                    borderWidth: 2
                }
            }
        }
    });

    // Radar Chart
    var ctxRadar = document.getElementById('scoreRadarChart').getContext('2d');
    var radarChart = new Chart(ctxRadar, {
        type: 'radar',
        data: {
            labels: ['Logical Reasoning', 'Math Skills', 'Verbal Skills', 'Spatial Awareness', 'Attention to Detail'],
            datasets: [{
                label: 'User Performance',
                data: [<?php 
                    echo join(", ", [rand(50, 100), rand(40, 90), rand(60, 80), rand(70, 100), rand(30, 70)]); 
                ?>],
                backgroundColor: 'rgba(46, 204, 113, 0.5)',
                borderColor: '#2ecc71',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 1500,
                easing: 'easeOutQuad'
            },
            plugins: {
                legend: {
                    labels: { color: 'black' }
                },
                tooltip: {
                    backgroundColor: '#fff',
                    titleColor: '#000',
                    bodyColor: '#000',
                    borderColor: '#2ecc71',
                    borderWidth: 2
                }
            },
            scales: {
                r: {
                    angleLines: { color: 'black' },
                    grid: { color: '#000' },
                    pointLabels: { color: 'black' },
                    ticks: { color: 'black', stepSize: 20 }
                }
            }
        }
    });
};
</script>

</body>
</html>
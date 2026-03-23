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

// Get user user_id and current test
$user_id = $_SESSION['user_id'];
$currentTest = $conn->real_escape_string($_SESSION['test_type']);  // Escaping special characters



// Score calculation logic using JOIN
$scoreQuery = "
    SELECT a.selected_answer, q.correct_answer
    FROM answer a
    JOIN question q ON a.question_id = q.q_no
    WHERE a.user_id = '$user_id' 
    AND a.test_type = '$currentTest' 
    AND q.test_type = '$currentTest'";

$scoreResult = $conn->query($scoreQuery);

$correct_answers = 0;
$total_questions = 5; // Total questions each user is expected to answer
$answered_questions = 0; // Count the actual answered questions

while ($row = $scoreResult->fetch_assoc()) {
    $answered_questions++;
    // echo "Selected Answer: " . $row['selected_answer'] . " | Correct Answer: " . $row['correct_answer'] . "<br>";

    if (trim(strtolower($row['correct_answer'])) === trim(strtolower($row['selected_answer']))) {
        $correct_answers++;
    }
}

// Insert score, test_type, and status into result table
$insertQuery = "
    INSERT INTO result (user_id, test_type, score, status) 
    VALUES ('$user_id', '" . trim($currentTest) . "', '$correct_answers', 'Attempted') 
    ON DUPLICATE KEY UPDATE score='$correct_answers', status='Attempted'";


$conn->query($insertQuery);
if (!$conn->query($insertQuery)) {
    die("Insert Error: " . $conn->error);
}


// Fetch the result for this test
$sql = "SELECT score FROM result WHERE user_id = '$user_id' AND test_type = '$currentTest'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$score = isset($row['score']) ? $row['score'] : '0';
// echo "<pre>$scoreQuery</pre>";  // Display the query
$scoreResult = $conn->query($scoreQuery);

if (!$scoreResult) {
    die("Error in score query: " . $conn->error);
} 

// Determine the next test
$tests = array_map('trim', ['Mathematics', 'Logical Reasoning', 'Memory', 'MBTI', 'Quiz']);
$nextTest = '';

foreach ($tests as $index => $test) {
    if ($test == $currentTest) {
        $nextTest = isset($tests[$index + 1]) ? $tests[$index + 1] : null;
        break;
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Result Page</title>
    <link rel="icon" href="images/logo.png">
    <style>
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .result-container {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            padding: 40px;
            text-align: center;
            animation: fadeIn 1.2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="icon">&#127942;</div> <!-- Trophy Icon -->
        <h2><?php echo $currentTest; ?> Test Result</h2>
        <p>Your Score: <strong><?php echo $score; ?>/<?php echo $total_questions; ?></strong></p>

        <?php if ($nextTest): ?>
            <button onclick="window.location.href='test_selection.php?next_test=<?php echo $nextTest;?>'" class="btn btn-custom">Next Test</button>
        <?php else: ?>
            <button onclick="window.location.href='result1.php'" class="btn btn-custom">result</button>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
session_start();
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
$user_id = $_SESSION['user_id'];  
$sql = "SELECT test_type, status FROM result WHERE user_id = '$user_id'";
$result = $conn->query($sql);

$statusData = [];
while ($row = $result->fetch_assoc()) {
    $statusData[$row['test_type']] = $row['status'];
}
$attemptedTests = count(array_filter($statusData, function($status) {
    return $status === 'Attempted';
}));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Selection</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
      body {
            background-color: #0d6efd; 
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px 0;
        }
        .container {
            text-align: center;
        }
        .test-div {
    background-color: #084298; 
    border-radius: 30px;
    padding: 30px;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.8);
    transition: transform 0.3s, opacity 0.5s ease-in-out;
    cursor: pointer;
    width: 100%;
    max-width: 300px;
    height: 300px;
    opacity: 0;
    transform: translateX(-100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    margin: 0 auto;
}


        .test-div:hover {
            transform: translateY(-5px) scale(1.05);
        }
        .test-image {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }
        .btn-custom, .start-test-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover, .start-test-btn:hover {
            background-color: #45a049;
        }
        .fade-in {
            opacity: 1;
            transform: translateX(0);
        }
        .button-group {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 p-3">
                <div class="test-div fade-in" data-test-type="Mathematics">
                    <img src="images/math.png" alt="Math" class="test-image">
                    <h5>Math</h5>
                    <button class="start-test-btn" onclick="startTest('Mathematics')">Start Test</button>
                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="test-div fade-in" data-test-type="Logical Reasoning">
                    <img src="images/logical.png" alt="Logical" class="test-image">
                    <h5>Logical</h5>
                    <button class="start-test-btn" onclick="startTest('Logical Reasoning')">Start Test</button>
                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="test-div fade-in" data-test-type="Memory">
                    <img src="images/memory.png" alt="Memory" class="test-image">
                    <h5>Memory</h5>
                    <button class="start-test-btn" onclick="startTest('Memory')">Start Test</button>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 p-3">
                <div class="test-div fade-in" data-test-type="MBTI">
                    <img src="images/mbti.png" alt="MBTI" class="test-image">
                    <h5>MBTI</h5>
                    <button class="start-test-btn" onclick="startTest('MBTI')">Start Test</button>
                </div>
            </div>
            <div class="col-md-4 p-3">
                <div class="test-div fade-in" data-test-type="Quiz">
                    <img src="images/quiz.png" alt="Quiz" class="test-image">
                    <h5>Quiz</h5>
                    <button class="start-test-btn" onclick="startTest('Quiz')">Start Test</button>
                </div>
            </div>
        </div>

        <div class="button-group">
            <button id="certificate-btn" class="btn-custom me-3">View Certification</button>
            <button class="btn-custom" onclick="window.location.href='result1.php'">View Overall Result</button>
        </div>
    </div>

    <script>
        function startTest(testType) {
            window.location.href = `questions.php?test_type=${testType}`;
        }

        document.addEventListener("DOMContentLoaded", function () {
            const statusData = <?php echo json_encode($statusData); ?>;
            const attemptCount = <?php echo $attemptedTests; ?>;

            const testDivs = document.querySelectorAll(".test-div");
            testDivs.forEach(div => {
                const testType = div.getAttribute("data-test-type");
                const heading = div.querySelector("h5");

                if (statusData[testType] === 'Attempted') {
                    heading.innerHTML += " ✅";
                    const button = div.querySelector(".start-test-btn");
                    button.textContent = "Attempted";
                    button.disabled = true;
                }
            });

            const certBtn = document.getElementById("certificate-btn");
            certBtn.addEventListener("click", function (e) {
                if (attemptCount < 5) {
                    e.preventDefault();
                    alert("Attempt all the test to unlock the certificate.");
                } else {
                    window.location.href = 'certificate.php';
                }
            });
        });
    </script>
</body>
</html>

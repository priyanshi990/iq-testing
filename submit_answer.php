<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user ID and test type from POST data
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
    $test_type = isset($_SESSION['test_type']) ? $_SESSION['test_type'] : '';

    // Check if selected answers are received
    if (isset($_POST['selectedAnswers'])) {
        $selectedAnswers = $_POST['selectedAnswers'];

        // Loop through each answer and store it in the database
        foreach ($selectedAnswers as $questionId => $answer) {
            // Insert each answer for the user with test type
            $stmt = $conn->prepare("INSERT INTO answer (user_id, question_id, selected_answer, test_type) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $user_id, $questionId, $answer, $test_type);
            $stmt->execute();
        }

        // Close the connection
        $stmt->close();
        $conn->close();

        // Return success response
        echo 'success'; // Send plain success response
    } else {
        echo 'error: No answers selected.';
    }
} else {
    echo 'error: Invalid request method.';
}
?>

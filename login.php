<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['actionType'] == 'login') {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $stmt = $conn->prepare("SELECT user_id, password FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            echo json_encode(['status' => 'success', 'message' => 'Login successful!', 'redirect' => 'payment.php']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid credentials.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No user found with this email.']);
    }
    $stmt->close();
    $conn->close();
}
?>
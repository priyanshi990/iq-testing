<?php
session_start();

if (isset($_POST['test_type'])) {
    $_SESSION['test_type'] = $_POST['test_type'];
}
?>

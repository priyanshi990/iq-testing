<?php
$showThankYou = false;
$message = '';

// Process the form only on POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : '';
    $message = preg_replace("/\s{2,}/", " ", $message); // Clean extra spaces

    if (strlen($message) <= 500 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $conn = new mysqli("localhost", "root", "", "test");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $stmt = $conn->prepare("INSERT INTO contact_messages (full_name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        $showThankYou = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>
  <link rel="icon" href="images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-MdFNQ+5xKJUkA7O1pAxM7+rslZVEo3gR0kZhnT9RPTmMwATVaTtklKp25ShLKZ+MxDeJJ7uKsblEKYkA3l9OMA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <style>
    body {
      background: linear-gradient(135deg, #dff1ff, #ffffff);
      background-attachment: fixed;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: relative;
      min-height: 100vh;
      overflow-x: hidden;
    }

    body::before,
    body::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      opacity: 0.5;
      z-index: -1;
    }

    body::before {
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, #8ec5fc, #e0c3fc);
      top: -100px;
      left: -100px;
    }

    body::after {
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, #fbc2eb, #a6c1ee);
      bottom: -150px;
      right: -150px;
    }

    h1 {
      font-size: 2.8rem;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 20px;
    }

    .logo-img {
      display: block;
      max-width: 180px;
      height: auto;
      margin-bottom: 20px;
      filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.15));
      transition: transform 0.3s ease;
    }

    .logo-img:hover {
      transform: scale(1.05);
    }

    .contact-card {
      background: #ffffff;
      padding: 35px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 1s ease;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.2rem;
      color: #6c757d;
      pointer-events: none;
      z-index: 2;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      padding-left: 2.5rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      background-color: #fff;
    }

    .form-control:focus {
      border-color: #66afe9;
      outline: none;
      box-shadow: 0 0 3px #66afe9;
    }

    label {
      display: block;
      margin-bottom: 0.25rem;
      font-weight: bold;
    }

    .form-text {
      font-size: 0.758rem;
      color: #6c757d;
    }

    .btn-primary {
      border-radius: 12px;
      padding: 0.6rem;
      background: linear-gradient(135deg, #0d6efd, #4f9ef9);
      border: none;
      transition: 0.3s ease;
      font-weight: bold;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #0b5ed7, #1f80ff);
    }

    label span {
      color: red;
    }

    .thank-you-popup {
      display: <?= $showThankYou ? 'block' : 'none' ?>;
      position: fixed;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #d4edda;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0,0,0,0.2);
      z-index: 9999;
      animation: fadeInDown 0.8s ease;
    }

    .contact-info {
      font-size: 1.1rem;
      margin-top: 20px;
    }

    .contact-info strong {
      color: #0056b3;
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

  <script>
    window.addEventListener("DOMContentLoaded", () => {
      const popup = document.querySelector('.thank-you-popup');
      if (popup && popup.style.display === 'block') {
        setTimeout(() => {
          popup.style.display = 'none';
          window.location.href = window.location.pathname;
        }, 4000);
      }
    });
  </script>
</head>
<body>
  <a href="i.php" class="home-btn">&larr; Home</a>

<div class="container py-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-10">
      <div class="row g-5 align-items-center">
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <img src="images/11.png" alt="IQ Test Global Logo" style="max-width: 80px;">
          <h1>Contact Us</h1>
          <p>We greatly appreciate your interest in proskillmind! Your feedback, questions, and suggestions are highly valued, and we are committed to providing you with outstanding support and service.</p>
          <p>Should you have any inquiries or require assistance, please don’t hesitate to get in touch with us. Our team is always ready to help and ensure your experience with our products and services is nothing short of exceptional.</p>
          <div class="contact-info">
            <p>
              <i class="bi bi-envelope"></i>
              Email: <strong><a href="mailto:pskill400@gmail.com">pskill400@gmail.com</a></strong>
            </p>
          </div>
        </div>
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <?php if (!$showThankYou): ?>
          <div class="contact-card">
            <form method="POST" action="" class="contact-form">
              <h3 class="text-center mb-4">💬</h3>
              <div class="form-group">
                <label for="name">Full Name <span>*</span></label>
                <input type="text" id="name" name="full_name" class="form-control" placeholder="Enter your full name" required>
              </div>

              <div class="form-group">
                <label for="email">Email <span>*</span></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
              </div>

              <div class="form-group">
                <label for="message">Message <span>*</span></label>
                <textarea id="message" name="message" class="form-control" rows="4" placeholder="Type your message" maxlength="500" required></textarea>
                <div class="form-text">Your message should be no longer than 500 characters.</div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
              </div>
            </form>
          </div>
          <?php else: ?>
          <div class="thank-you-popup">
            <h5 class="text-success">Thank you for reaching out! 😊</h5>
            <p>Your message has been successfully sent.</p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSkill Mind</title>
    <link rel="icon" href="images/logo.png">
    <style>
        .profile-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
            vertical-align: middle;
        }
    </style>
    <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<div class="section-1" id="section-1">
    <a href="#" class="logo">
        <img src="images/logo.png" alt="Logo" class="logo">

    </a>
    <nav class="navbar">
        <a href="i.php" class="navbar-link">Home</a>
        <a href="#section-2" class="navbar-link">About Us</a>
        <a href="contact.php" class="navbar-link">Contact Us</a>
        <a href="FAQ.php" class="navbar-link">FAQ's</a>
        <a href="leaderboard.php" class="navbar-link">Leaderboard</a>
        <a href="adminlogin.php" class="navbar-link">Admin</a>
        <a href="profile.php" class="navbar-link profile-container">
            <img src="images/profile.png" alt="Profile" class="profile-icon">
            <span class="online-status"></span></a>
    </nav>
    <div class="section-1-banner">
        <h1>ProSkill Mind</h1>
        <p>Elevate Your Thinking, <span>Enhance Your Skills.</span></p>
        <a href="#iq-test-section" class="get-started-button">Get Started</a>
    </div>
</div>
<div id="iq-test-section">
    <h2>"Choose Your Path to Unlock Potential!"</h2>
</div>
</section>
<section class="iq-test-section" id="section-iq-test">
    <div class="iq-test-box">
        <div class="iq-test-icon quick-test-icon">
            <img src="images/logo.png" alt="Quick IQ Test Icon">
        </div>
        <div class="iq-test-content">
            <h3>"Think Smarter, Test Freely"</h3>
            <p>Free IQ Test provides Basic IQ Test and You'll receive your <strong>reliable results </strong> </p>
            <button type="button" class="start-test-btn" onclick="window.location.href='p2.php'">Start the Test</button>
        </div>
    </div>
    <div class="iq-test-box">
        <div class="iq-test-icon advanced-test-icon">
            <img src="images/logo.png" alt="Advanced IQ Test Icon">
        </div>
        <div class="iq-test-content">
            <h3>"Get the full Picture of Your Genius"</h3>
            <p>Premium IQ test provides advance IQ Test with detailed insights. Get your <strong>IQ score, robust
                    results, and certificate</strong> after completion.</p>
            <button type="button" class="start-test-btn" onclick="window.location.href='instructions.php'">Start the
                Test</button>
        </div>
    </div>
</section>
<section class="section-2" id="section-2">
    <h1 class="section-2-heading">About Us</h1>
    <div class="about-us-description">
        <p>ProSkill Mind is dedicated to helping individuals assess and enhance their cognitive abilities through our IQ
            testing platform. We offer both free and premium test options tailored to different needs. The free test
            provides a straightforward experience with a static set of questions and a basic result summary. For a more
            comprehensive evaluation, the premium test offers dynamic, adaptive questions that adjust based on your
            responses, delivering an in-depth analysis, personalized results, and a certificate of achievement upon
            completion. With ProSkill Mind, you can explore your cognitive strengths and gain valuable insights to
            support your growth.</p>
    </div>
    <div class="iphones">
        <img src="images/bran1.png" class="iphone-img-1">
        <img src="images/bran2.png" class="iphone-img-2">
    </div>
</section>
<section class="personalities-section">
    <h1>IQ's Famous Personalities</h1>
    <div id="personalitiesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center gap-3">
                    <div class="personality-card">
                        <img src="images/22.png" alt="Albert Einstein">
                        <div class="content">
                            <h5>Albert Einstein</h5>
                            <p>Albert Einstein, with an estimated IQ between 160-180, is celebrated for his
                                groundbreaking theories in physics.</p>
                        </div>
                    </div>
                    <div class="personality-card">
                        <img src="images/21.png" alt="Isaac Newton">
                        <div class="content">
                            <h5>Isaac Newton</h5>
                            <p>Isaac Newton made revolutionary contributions to mathematics, physics, and astronomy with
                                an IQ around 190 or higher.</p>
                        </div>
                    </div>
                    <div class="personality-card">
                        <img src="images/23.png" alt="Marie Curie">
                        <div class="content">
                            <h5>Marie Curie</h5>
                            <p>Marie Curie, a pioneering physicist and chemist, was the first person to win Nobel Prizes
                                in two sciences.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="personality-card">
                <img src="images/24.png" alt="Stephen Hawking">
                <div class="content">
                    <h5>Stephen Hawking</h5>
                    <p>Stephen Hawking, a theoretical physicist with an IQ around 160, made fundamental contributions to
                        cosmology and black holes.</p>
                </div>
            </div>
            <div class="personality-card">
                <img src="images/25.png" alt="Terence Tao">
                <div class="content">
                    <h5>Terence Tao</h5>
                    <p>Mathematician Terence Tao, with an IQ over 220, is known for breakthroughs in number theory and
                        harmonic analysis.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="stats-section"> <canvas id="countryChart" width="100" height="100"></canvas>
    <h2 class="gradient-text">Country Statistics</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="images/usa.png">
            <h3>USA</h3>
            <p><strong>Population:</strong> 331 million</p>
            <p><strong>GDP:</strong> $21.43 trillion</p>
            <p><strong>Education Rate:</strong> 89%</p>
        </div>
        <div class="col-md-4">
            <img src="images/uk.jfif">
            <h3>UK</h3>
            <p><strong>Population:</strong> 67 million</p>
            <p><strong>GDP:</strong> $2.83 trillion</p>
            <p><strong>Education Rate:</strong> 86%</p>
        </div>
        <div class="col-md-4">
            <img src="images/india.png">
            <h3>India</h3>
            <p><strong>Population:</strong> 1.366 billion</p>
            <p><strong>GDP:</strong> $2.87 trillion</p>
            <p><strong>Education Rate:</strong> 74%</p>
        </div>
    </div>
</div>
<div class="testimonials-section">
    <h1 class="gradient-text" class="gradient-text">-WHAT OUR USERS SAY-</h1>
    <div class="testimonial-slider">
        <div class="testimonial">
            <img src="images/user1.jfif" alt="User 1">
            <p>"This IQ test was a great experience!"</p>
            <h3 style="color: lightblue;">Riya</h3>
        </div>
        <div class="testimonial">
            <img src="images/user2.jfif" alt="User 2">
            <p>"I loved the design and interactivity."</p>
            <h3 style="color: lightblue;">MAX</h3>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-links">
        <a href="i.php">Home</a>
        <a href="FAQ.php">FAQ's</a>
        <a href="#section-2">About</a>
        <a href="contact.php">Contact Us</a>
    </div>

    <div class="social-icons">
        <a href="https://www.facebook.com/profile.php?id=61575335060520" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/proskillmind3?igsh=Z3Y5Nnk3NWY0YjNw" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://twitter.com" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://plus.google.com" target="_blank">
            <i class="fab fa-google-plus-g"></i>
        </a>
        <a href="https://www.youtube.com" target="_blank">
            <i class="fab fa-youtube"></i>
        </a>
    </div>

    <p class="copyright">Copyright © 2024; Designed by <strong>ProSkill Mind</strong></p>
</footer>
<script src="s.js"></script>
<script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const navbar = document.querySelector('.navbar');
    const ctx = document.getElementById('countryChart').getContext('2d');
    const countryChart = new Chart(ctx, {
        type: 'pie',
    data: {
        labels: ['USA', 'UK', 'India'],
    datasets: [{
        label: 'Country GDP (Trillions)',
    data: [21.43, 2.83, 2.87],
    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
    borderColor: '#fff',
    borderWidth: 2
            }]
        },
    options: {
        responsive: true,
    plugins: {
        legend: {
        position: 'top',
                },
    title: {
        display: true,
    text: 'GDP Distribution by Country'
                }
            }
        }
    });
</script>
</body>

</html>
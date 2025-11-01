<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $tel     = $_POST['tel'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kasakgupta0507@gmail.com';  // your gmail
        $mail->Password   = 'mnrj llcw dlty nrrx';       // Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('kasakgupta0507@gmail.com', 'Get In Touch');
        $mail->addAddress('kasak005btit24@igdtuw.ac.in', 'AIOUS Website');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <h2>New Message from Website Contact Form</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$tel}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();

        // Redirect with success
        header("Location: Get_in_touch.php?status=success");
        exit();
    } catch (Exception $e) {
        // Redirect with error
        header("Location: Get_in_touch.php?status=error");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get_in_touch</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <!-- =============== NAVBAR SECTION =============== -->
  <nav class="navbar">
    <div class="navbar-container">
      <!-- Website Logo -->
      <img class="logo" src="Images/AIOUS Logo.png" alt="AIOUS Logo" />

      <!-- Hamburger icon for mobile view -->
      <div class="hamburger" id="hamburger">&#9776;</div>

      <!-- Navigation links -->
      <ul class="navbar-items" id="navbar-items">
        <li><a href="index.html">Home</a></li>
        <li><a href="Team_Page.html">Team</a></li>
        <li><a href="#">Achievements</a></li>
        <li><a href="studentformula.html">Formula Student</a></li>
        <li><a href="SponsorPage.html">Sponsors</a></li>
        <li><a href="Gallery.html">Gallery</a></li>
        <li><a href="#">Support Us</a></li>
        <li><a href="Get_in_touch.php">Contact Us</a></li>
      </ul>
    </div>
  </nav>
<!-- contact section    -->
<section class="contact-sectionn" id="contact">
  <div class="contact-container">
    <!-- Left: Contact Form -->
    <div class="contact-form">
      <h2>GET IN TOUCH</h2>
      <p>FILL IN THE DETAILS BELOW, AND OUR TEAM WILL GET BACK TO YOU.</p>

      <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
    <div class="success">Message sent successfully!</div>
<?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
    <div class="alert">Oops! Something went wrong. Try again.</div>
<?php endif; ?>


      <form id="contactForm" action="Get_in_touch.php" method = "post"> 
  <input type="text" name = "name" id="fullname" placeholder="Full Name" required />
  <input type="email" name = "email" id="email" placeholder="Email Address" required />
  <input type="tel" name = "tel" id="phone" placeholder="Phone Number" required />
  <textarea id="message" name = "message" placeholder="Your Message" required></textarea>
  <button type="submit" name = "submit" class="submit-btn">Submit →</button>
      </form>

      <div class="brochure-links">
        <a href="#">VIEW OUR BROCHURE HERE</a>
        <a href="assets/AiousBrochure'25.pdf" class="btn-outline">AIOUS Brochure 2025</a>
      </div>
    </div>

    <!-- Right: Contact Info & Map -->
    <div class="contact-detailss">
      <h3>Get in touch</h3>
      <ul>
        <li><img src="Images/call_logo.png" alt="Phone" /> +91 9354708289<br />+91 9971616971</li>
        <li><img src="Images/mail-logo.png" alt="Email" /> aiousfinance@gmail.com<br /> aious09formulastudent@gmail.com</li>
        <li><img src="Images/loc-logo.png" alt="Location" /> Indira Gandhi Delhi Technical University for Women<br />
            James Church, New Church Rd, Opp. St, Kashmere Gate,<br />
            New Delhi, Delhi 110006</li>
      </ul>

      <!-- <div class="socialss">
        <span>Socials</span>
        <div class="iconss">
          <img src="Images/linkedin-logo.png" alt="LinkedIn" />
          <img src="Images/instaa-logo.png" alt="Instagram" />
          <img src="Images/whats-logo.png" alt="WhatsApp" />
        </div>
      </div> -->

      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.8055370276666!2d77.229432974958!3d28.66554078258183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd0683919c3b%3A0xf5fc331b74c2b9e2!2sIndira%20Gandhi%20Delhi%20Technical%20University%20for%20Women!5e0!3m2!1sen!2sin!4v1748873404441!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>
 <!-- =============== FOOTER SECTION =============== -->
      <footer class="footer" id="contact">
        <div class="footer-container">
          <div class="footer-section logo-section">
            <h1>AIOUS</h1>
            <p>South Asia's First All Women <br>Formula Student Team</p>
            <section class="email-signup">
              <div class="signup-container">

                <p>Enter your email here</p>
                <form id="signupForm" class="signup-form">
                  <input type="email" id="email" name="email" placeholder=" " required>
                  <button type="submit">Sign Up</button>
                </form>
              </div>
            </section>
          </div>

          <div class="footer-section quick-links">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="#hero-section">Home</a></li>
              <li><a href="#aboutUs">About Us</a></li>
              <li><a href="Team_Page.html">Team</a></li>
              <li><a href="SponsorPage.html">Sponsorship</a></li>
              <li><a href="Gallery.html">Gallery</a></li>
              <li><a href="Get_in_touch.html">Contact</a></li>
            </ul>
          </div>

          <div class="footer-section contact-section">
            <h3>Get in touch</h3>
            <p><img src="Images/call_logo.png" alt="Phone"> +91 9354708289<br>+91 9971616971</p>
            <p><img src="Images/mail-logo.png" alt="Mail"> aiousfinance@gmail.com<br>aious05formulastudent@gmail.com</p>
            <p><img src="Images/loc-logo.png" alt="Location"> Indira Gandhi Delhi Technical University for
              Women<br>James
              Church, New Church Rd, Opp. St, Kashmere Gate, New Delhi, Delhi 110006</p>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; 2025 • <strong>AIOUS</strong>. All rights reserved.</p>
          <div class="social-icons">
            <a href="linkedin"><img src="Images/linkedin-logo.png" alt="https://www.linkedin.com/company/aiousformulastudent/posts/?feedView=all"></a>
            <a href="instagram"><img src="Images/instaa-logo.png" alt="https://www.instagram.com/aiousformulastudent/?hl=en"></a>
            <a href="watsapp"><img src="Images/whats-logo.png" alt="WhatsApp"></a>
          </div>
        </div>
      </footer>
<!-- end of footer section -->

<script src="script.js"></script>
</body>
</html>


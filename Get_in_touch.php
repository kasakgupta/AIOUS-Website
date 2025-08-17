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
          <li><a href="index.html">Formula Student</a></li>
          <li><a href="Gallery.html">Gallery</a></li>
          <li><a href="Team_Page.html">Team</a></li>
          <li><a href="#">CrowdFunding</a></li>
          <li><a href="SponsorPage.html">Sponsorship</a></li>
          <li><a href="Get_in_touch.html">Contact Us</a></li>
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

      <form id="contactForm" action="" method = "post"> 
  <input type="text" name = "name" id="fullname" placeholder="Full Name" required />
  <input type="email" name = "email" id="email" placeholder="Email Address" required />
  <input type="tel" name = "tel" id="phone" placeholder="Phone Number" required />
  <textarea id="message" name = "message" placeholder="Your Message" required></textarea>
  <button type="submit" name = "submit" class="submit-btn">Submit →</button>
      </form>

      <div class="brochure-links">
        <a href="#">VIEW OUR BROCHURE HERE</a>
        <a href="#" class="btn-outline">AIOUS Brochure 2025</a>
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
    <p2>Stay Updated</p2>
    <p>Enter your email to receive the latest updates.</p>
    <form id="signupForm" class="signup-form">
      <input type="email" id="email" name="email" placeholder="Enter your email here" required>
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
        <p><img  src="Images/mail-logo.png" alt="Mail"> aiousfinance@gmail.com<br>aious05formulastudent@gmail.com</p>
        <p><img src="Images/loc-logo.png" alt="Location"> Indira Gandhi Delhi Technical University for Women<br>James Church, New Church Rd, Opp. St, Kashmere Gate, New Delhi, Delhi 110006</p>
      </div>
    </div>
  
    <div class="footer-bottom">
      <p>&copy; 2025 • <strong>AIOUS</strong>. All rights reserved.</p>
      <div class="social-icons">
        Socials
        <a href="linkedin"><img src="Images/linkedin-logo.png" alt="LinkedIn"></a>
        <a href="instagram"><img src="Images/instaa-logo.png" alt="Instagram"></a>
        <a href="watsapp"><img src="Images/whats-logo.png" alt="WhatsApp"></a>
      </div>
    </div>
  </footer>
<!-- end of footer section -->

<script src="script.js"></script>
</body>
</html>

<?php


    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['message'];


//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kasakgupta0507@gmail.com';                     //SMTP username
    $mail->Password   = 'mnrj llcw dlty nrrx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kasakgupta0507@gmail.com', 'Get In Touch');
    $mail->addAddress('kasak005btit24@igdtuw.ac.in', 'AIOUS Website');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Test';
    $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> Sender PhoneNo. - $tel <br> message - $message";

    $mail->send();
    echo "<div class = 'success'> Message Has Been Sent!</div>";
} catch (Exception $e) {
    echo "<div class = 'alert'> Message Not Sent!</div>";
}
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <title>Contact</title>
</head>

<body>
  <div class="container">
    <nav id="navbar">
      <div class="nav-logo">Saloon <span>3</span></div>
      <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <div class="hamburger" id="hamburger" onclick="toggleMenu()">☰</div>
    </nav>
    <section id="contact">
      <div class="contact-title reveal">
        <h2 class="section-title" style="color:var(--cream)">Contact Us</h2>
      </div>
      <div class="contact-grid">
        <div class="contact-info reveal">
          <div class="contact-block">
            <h4>Address</h4>
            <p>Rond-Point Ahbasse, Av. Dakhla<br>Marrakech, Morocco</p>
          </div>
          <div class="contact-block">
            <h4>Hours</h4>
            <p>Everyday : 7:00 am to 12:00 pm</p>
          </div>
          <div class="contact-block">
            <h4>Phone and Email</h4>
            <p>+212 5 22 00 00 00<br>test@saloon3.ma</p>
          </div>
          <div class="contact-block">
            <h4>Follow Us</h4>
            <p>@saloon3 on Instagram</p>
          </div>
        </div>
        <div class="reveal">
          <form class="contact-form" id="contactForm" onsubmit="submitForm(event)">
            <div class="form-row">
              <div class="form-group"><label>Name</label><input type="text" name="name" placeholder="Your name"
                  required /></div>
              <div class="form-group"><label>Phone</label><input type="tel" name="phone"
                  placeholder="+212 6 00 00 00 00" /></div>
            </div>
            <div class="form-group"><label>Email</label><input type="email" name="email" placeholder="your@email.com"
                required />
            </div>
            <div class="form-group"><label>Subject</label>
              <select name="subject">
                <option value="Private Event">Private Event</option>
                <option value="Catering Inquiry">Comment</option>
                <option value="General Question">General Question</option>
              </select>
            </div>
            <div class="form-group"><label>Message</label><textarea name="message"
                placeholder="Tell us how we can help..." required></textarea>
            </div>
            <button type="submit" class="btn-send">Send Message</button>
          </form>
          <div class="form-success" id="formSuccess">Thank you! We will be in touch soon.</div>
        </div>
      </div>
    </section>
    <footer>
      <div class="footer-logo">Saloon 3</div>
      <ul class="footer-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#photos">Gallery</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <div class="footer-para">Saloon 3 Marrakech</div>
    </footer>
  </div>
  <script src="script.js"></script>
</body>

</html>
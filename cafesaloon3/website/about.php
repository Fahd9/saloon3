<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <title>Saloon 3 — Café & Restaurant</title>
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
        <li><a href="contact.php" class="nav-cta">Contact</a></li>
      </ul>
      <button class="hamburger" id="hamburger" onclick="toggleMenu()" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </nav>
    <section id="about">
      <div class="about-header">
        <h2 class="section-title">About Us</h2>
      </div>
      <div class="about-grid reveal">
        <div class="about-img-stack reveal">
          <div class="about-img"><img src="../uploads/IMG-20260427-WA0006 (1).jpg" alt="Cafe atmosphere" /></div>
        </div>
        <div class="about-content reveal">
          <p class="section-label">Our Story</p>
          <p class="section-sub">Saloon 3 was born from a simple belief: that a cafe should feel like a third place, not
            home, not work, but somewhere in between. we have been that place for Marrakech. We source our beans from
            special places Our kitchen bakes fresh every morning, noshortcuts, no compromises.</p>
          <div class="about-stats">
            <div class="stat-box">
              <div class="stat-num">6+</div>
              <div class="stat-lbl">Years Open</div>
            </div>
            <div class="stat-box">
              <div class="stat-num">40+</div>
              <div class="stat-lbl">Menu Items</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="location">
      <div class="location-header reveal">
        <h2 class="section-title">Our Location</h2>
      </div>
      <div class="location-map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d849.3028598692731!2d-8.06001820321569!3d31.628060697006553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafe98c8448b979%3A0x6bf02f474ce21b7f!2sSaloon%203%20Marrakech!5e0!3m2!1sfr!2sma!4v1774535748767!5m2!1sfr!2sma">
        </iframe>
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
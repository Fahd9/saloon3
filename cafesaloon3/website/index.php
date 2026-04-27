<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <title>Saloon 3 — Café & Restaurant</title>
</head>

<body>
  <div class="home-img">
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
      <section id="home">
        <div class="hero-content reveal">
          <div class="hero-eyebrow">Saloon 3, Marrakech</div>
          <h1 class="hero-title">Where Coffee<br>Meets <em>Soul</em></h1>
          <p class="hero-desc">A corner of warmth in the heart of the city. At Saloon 3, every cup is brewed with
            intention and every visit feels like coming home.</p>
          <a href="menu.php" class="btn-primary">Explore Menu</a>
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
  </div>
  <script src="script.js"></script>
</body>

</html>
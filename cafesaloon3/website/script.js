  // MOBILE HAMBURGER MENU
  function toggleMenu() {
  const navLinks = document.getElementById("navLinks");
  navLinks.classList.toggle("active");
}

// =====================
// NAVBAR SCROLL EFFECT
// =====================
document.addEventListener("DOMContentLoaded", () => {
  const navbar = document.getElementById("navbar");

  if (navbar) {
    window.addEventListener("scroll", () => {
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });
  }

  // =====================
  // SCROLL REVEAL
  // =====================
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.1 }
  );

  document.querySelectorAll(".reveal").forEach((el) => {
    observer.observe(el);
  });

  // =====================
  // MENU ANIMATION
  // =====================
  const menuItems = document.querySelectorAll(".menu-item");

  function animateMenuItems() {
    menuItems.forEach((el, i) => {
      el.classList.remove("visible");
      setTimeout(() => el.classList.add("visible"), i * 70);
    });
  }

  window.addEventListener("load", animateMenuItems);

  // =====================
  // CONTACT FORM
  // =====================
  window.submitForm = function (e) {
    e.preventDefault();

    const form = document.getElementById("contactForm");
    const formData = new FormData(form);

    fetch("process_contact.php", {
      method: "POST",
      body: formData
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.status === "success") {
          form.reset();
          form.style.display = "none";

          const success = document.getElementById("formSuccess");
          if (success) success.style.display = "block";
        } else {
          alert("Error: " + data.message);
        }
      })
      .catch((err) => {
        console.error("Error:", err);
        alert("An error occurred submitting the form.");
      });
  };
});
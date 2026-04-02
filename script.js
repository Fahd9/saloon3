const navbar = document.getElementById('navbar');
if (navbar) {
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  });
}

window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 50));

const navLinks = document.getElementById('navLinks');
function toggleMenu() {
  navLinks.classList.toggle('open');
}

document.querySelectorAll('.nav-links a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));

function switchTab(id, btn) {
  document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('tab-' + id).classList.add('active');
  btn.classList.add('active');
  animateMenuItems();
}

const menuItems = document.querySelectorAll('.menu-item');

function animateMenuItems() {
  menuItems.forEach((el, i) => {
    el.classList.remove('visible');
    setTimeout(() => el.classList.add('visible'), i * 70);
  });
}

const observer = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible') });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
window.addEventListener('load', animateMenuItems);

function submitForm(e) {
  e.preventDefault();

  const form = document.getElementById('contactForm');
  form.reset(); // clears inputs
  form.style.display = 'none';

  document.getElementById('formSuccess').style.display = 'block';
}
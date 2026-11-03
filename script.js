document.getElementById('menuToggle').addEventListener('click', function() {
  const navbarLinks = document.getElementById('primary-nav');
  const isOpen = navbarLinks.classList.toggle('open');
  this.classList.toggle('active');
  this.setAttribute('aria-expanded', isOpen);
});

// Script for handling the hamburger menu toggle
// const menuToggle = document.getElementById('menuToggle');
// const navbarLinks = document.getElementById('primary-nav');

// menuToggle.addEventListener('click', () => {
//   // Toggle 'open' class to show/hide the navbar links
//   navbarLinks.classList.toggle('open');

//   // Toggle active state of the hamburger button for animation
//   menuToggle.classList.toggle('active');

//   // Update the aria-expanded attribute for accessibility
//   const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
//   menuToggle.setAttribute('aria-expanded', !expanded);
// });

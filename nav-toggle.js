// small accessible toggle — include with defer on pages
document.getElementById('menuToggle').addEventListener('click', function() {
  const navbarLinks = document.getElementById('primary-nav');
  const isOpen = navbarLinks.classList.toggle('open');
  this.classList.toggle('active');
  this.setAttribute('aria-expanded', isOpen);
});

(function(){
  const btn = document.getElementById('menuToggle');
  const nav = document.querySelector('.navbar');
  const list = document.getElementById('primary-nav');

  if (!btn || !nav || !list) return;

  function closeMenu(){
    nav.classList.remove('open');
    btn.setAttribute('aria-expanded','false');
  }
  function openMenu(){
    nav.classList.add('open');
    btn.setAttribute('aria-expanded','true');
    const first = list.querySelector('a');
    if (first) first.focus();
  }

  btn.addEventListener('click', () => {
    nav.classList.contains('open') ? closeMenu() : openMenu();
  });

  document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeMenu(); });

  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target) && nav.classList.contains('open')) closeMenu();
  });

  window.addEventListener('resize', () => { if (window.innerWidth > 768) closeMenu(); });
})();
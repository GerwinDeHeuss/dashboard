const toggleBtn = document.querySelector('.toggle-btn');
const sidebar = document.querySelector('.sidebar');
const overlay = document.querySelector('.overlay');
const main = document.querySelector('main');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('open');
    overlay.classList.toggle('active');
    main.classList.toggle('shift');
});

overlay.addEventListener('click', () => {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
    main.classList.remove('shift');
});

document.querySelector('.open-slide-in').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('slide-in').classList.add('open');
    document.getElementById('slide-in-overlay').classList.add('open');
});
document.getElementById('slide-in-close').addEventListener('click', function() {
    document.getElementById('slide-in').classList.remove('open');
    document.getElementById('slide-in-overlay').classList.remove('open');
});
document.getElementById('slide-in-overlay').addEventListener('click', function() {
    document.getElementById('slide-in').classList.remove('open');
    document.getElementById('slide-in-overlay').classList.remove('open');
});

document.addEventListener('DOMContentLoaded', () => {
    const activeLink = document.querySelector('.sidebar nav a.active');
    const heading = document.querySelector('main header .content h1');

    if (activeLink && heading) {
      heading.textContent = activeLink.textContent;
    }
  });
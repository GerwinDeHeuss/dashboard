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


//   const toggleBtn = document.querySelector('.toggle-btn');
//   const sidebar = document.querySelector('.sidebar');
//   const overlay = document.querySelector('.overlay');

//   function toggleSidebar() {
//     sidebar.classList.toggle('open');
//     overlay.classList.toggle('show');
//   }

//   toggleBtn.addEventListener('click', toggleSidebar);
//   overlay.addEventListener('click', toggleSidebar);

//   // Optioneel: sluit sidebar met ESC toets
//   document.addEventListener('keydown', (e) => {
//     if (e.key === 'Escape' && sidebar.classList.contains('open')) {
//       toggleSidebar();
//     }
//   });


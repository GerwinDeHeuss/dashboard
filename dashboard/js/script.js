document.querySelector('.blue-btn').addEventListener('click', function(e) {
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
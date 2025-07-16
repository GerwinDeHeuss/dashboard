document.querySelector('.blue-btn').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('drawer').classList.add('open');
    document.getElementById('drawer-overlay').classList.add('open');
});
document.getElementById('drawer-close').addEventListener('click', function() {
    document.getElementById('drawer').classList.remove('open');
    document.getElementById('drawer-overlay').classList.remove('open');
});
document.getElementById('drawer-overlay').addEventListener('click', function() {
    document.getElementById('drawer').classList.remove('open');
    document.getElementById('drawer-overlay').classList.remove('open');
});
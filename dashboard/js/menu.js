// Menu tab switching
document.querySelectorAll('.menu button').forEach(btn => {
    btn.addEventListener('click', () => {
        const sectionId = btn.getAttribute('data-section');

        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.add('hidden');
            section.classList.remove('active');
        });

        const target = document.getElementById(sectionId);
        target.classList.remove('hidden');
        target.classList.add('active');

        document.querySelectorAll('.menu button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    });
});
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

// Menu tab switching - alleen actief als menu buttons aanwezig zijn
document.addEventListener('DOMContentLoaded', () => {
    const menuButtons = document.querySelectorAll('.menu button');
    if (menuButtons.length === 0) return;

    menuButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const sectionId = btn.getAttribute('data-section');

            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('active');
            });

            const target = document.getElementById(sectionId);
            target.classList.remove('hidden');
            target.classList.add('active');

            menuButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });
});

// Menu drag & drop functionaliteit - alleen actief als menu items aanwezig zijn
document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');
    if (menuItems.length === 0) return;

    let draggedElement = null;

    // Event delegation voor drag events
    document.addEventListener('dragstart', function(e) {
        if (e.target.classList.contains('menu-item')) {
            draggedElement = e.target;
            e.target.classList.add('dragging');
        }
    });

    document.addEventListener('dragend', function(e) {
        if (e.target.classList.contains('menu-item')) {
            e.target.classList.remove('dragging');
        }
    });

    // Maak alle menu items draggable
    menuItems.forEach(item => {
        item.draggable = true;
    });

    document.querySelectorAll('.menu-items-list').forEach(list => {
        list.addEventListener('dragover', function(e) {
            e.preventDefault();
            if (!draggedElement) return;

            const afterElement = getDragAfterElement(this, e.clientY);
            if (afterElement == null) {
                this.appendChild(draggedElement);
            } else {
                this.insertBefore(draggedElement, afterElement);
            }
        });

        list.addEventListener('drop', function(e) {
            e.preventDefault();
            if (!draggedElement) return;

            const targetActive = parseInt(this.dataset.active);
            const currentActive = parseInt(draggedElement.dataset.active);

            // Update data-active attribuut
            if (targetActive !== currentActive) {
                draggedElement.dataset.active = targetActive;
            }
        });
    });

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.menu-item:not(.dragging)')];

        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;

            if (offset < 0 && offset > closest.offset) {
                return {
                    offset: offset,
                    element: child
                };
            } else {
                return closest;
            }
        }, {
            offset: Number.NEGATIVE_INFINITY
        }).element;
    }

    // Maak saveAllChanges globaal beschikbaar voor onclick handler
    window.saveAllChanges = function() {
        const activeItems = Array.from(document.querySelectorAll('.menu-items-list[data-active="1"] .menu-item')).map(
            item => parseInt(item.dataset.id));
        const inactiveItems = Array.from(document.querySelectorAll('.menu-items-list[data-active="0"] .menu-item')).map(
            item => parseInt(item.dataset.id));

        fetch('../../controllers/menu/saveMenu.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `action=save_all&active_items=${JSON.stringify(activeItems)}&inactive_items=${JSON.stringify(inactiveItems)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '?success=1';
                } else {
                    alert('Fout bij opslaan menu');
                }
            });
    };
});



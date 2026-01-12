// Drag and Drop met twee kolommen
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
document.querySelectorAll('.menu-item').forEach(item => {
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

function saveAllChanges() {
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
}

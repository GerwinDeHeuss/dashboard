<?php 

require_once  '../../controllers/widgets/edit.php';

include('../includes/header.php');

?>

<form method="post" action="" onsubmit="isUpdated = false;">
    <section id="widgets">
        <div class="container">
            <div class="justify-between">
                <div class="intro">
                    <h2 class="flex">
                        <a href="./index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px"
                                fill="#14253D">
                                <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                            </svg>
                        </a>
                        <?= htmlspecialchars(strip_tags($widget['title'])) ?>
                    </h2>
                    <p>Bewerk de widget <?= htmlspecialchars(strip_tags($widget['title'])) ?></p>
                </div>
                <div class="align-center">
                    <button type="submit" name="save_widget" class="blue-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#292D32">
                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                        </svg>
                        Opslaan
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="widgets_edit">
        <div class="container">
            <div class="flex">
                <div class="menu">
                    <ul>
                        <li><button type="button" class="active" data-section="widget">Widget</button></li>
                        <li><button type="button" data-section="settings">Instellingen</button></li>
                    </ul>
                </div>
                <div class="content">
                    <div class="content-section active" id="widget">
                        <div class="header">
                            <h2>Widget bewerken: <?= htmlspecialchars(strip_tags($widget['title'])) ?></h2>
                        </div>
                        <div class="info">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($widget['content_id']) ?>">

                            <div class="form-group">
                                <div class="form-row">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <label for="title">Titel</label>
                                        <button type="button" class="code-toggle-btn" data-target="title" title="Code modus" style="opacity: 0; transition: opacity 0.3s;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#5f6368">
                                                <path d="M320-240 80-480l240-240 57 57-184 184 183 183-56 56Zm320 0-57-57 184-184-183-183 56-56 240 240-240 240Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <input type="hidden" id="title" name="title" value="<?= htmlspecialchars($widget['title'], ENT_QUOTES) ?>">
                                    <input type="text" id="title-display" value="<?= htmlspecialchars(strip_tags($widget['title'])) ?>" required placeholder="Titel invoeren">
                                </div>

                                <div class="form-row">
                                    <label for="description">Omschrijving</label><br>
                                    <input type="text" id="description" name="description"
                                        value="<?= htmlspecialchars($widget['description'], ENT_QUOTES) ?>" required>
                                </div>

                                <div class="form-row">
                                    <label for="text">Tekst</label><br>
                                    <textarea id="text" name="text" rows="5"
                                        required><?= htmlspecialchars($widget['text'], ENT_QUOTES) ?></textarea>
                                </div>
                                <div>
                                    <p class="created">Laatst bewerkt: <?= htmlspecialchars($widget['last_edit']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section hidden" id="settings">
                        <div class="header">
                            <h2>Instellingen voor <?= htmlspecialchars(strip_tags($widget['title'])) ?></h2>
                        </div>
                        <div class="info">
                            <p>Hier kunnen later meer instellingen komen</p>
                            <p class="created">Aangemaakt: <?= htmlspecialchars($widget['created_at']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>

<div id="slide-in">
    <div class="slide-in-header">
        <h2>HTML Code Editor</h2>
        <button id="slide-in-close">&times;</button>
    </div>
    <div style="padding: 20px;">
        <label for="slide-in-code">HTML Code:</label><br>
        <textarea id="slide-in-code" name="code" rows="15" style="width: 100%; padding: 12px; margin-bottom: 12px; font-family: 'Consolas', 'Monaco', 'Courier New', monospace; font-size: 14px; line-height: 1.5; background: #1e1e1e; color: #d4d4d4; border: 1px solid #444; border-radius: 4px; resize: vertical; tab-size: 2;" placeholder="<h1 class='my-class'>Uw HTML code hier</h1>"></textarea><br>
        <button type="button" id="format-code-btn" class="white-btn" style="margin-right: 8px;">Code Formatteren</button>
        <button type="button" id="apply-code-btn" class="blue-btn">Code Toepassen</button>
    </div>
</div>

<style>
.code-toggle-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    transition: all 0.3s;
}

.code-toggle-btn:hover {
    background: #f0f0f0;
    border-radius: 4px;
}

.code-toggle-btn.active {
    background: #e3f2fd;
    border-radius: 4px;
}

.code-toggle-btn.active svg {
    fill: #1976d2 !important;
}

.code-mode {
    font-family: 'Courier New', monospace;
    background: #f5f5f5;
    border: 2px solid #1976d2 !important;
}
</style>

<script>


// Success message auto-hide
const successAlert = document.querySelector('.alert.success');
if (successAlert) {
    setTimeout(() => {
        successAlert.style.display = 'none';
    }, 4000);
}

// Popup functionaliteit
const slideIn = document.getElementById('slide-in');
const slideInClose = document.getElementById('slide-in-close');
const slideInCode = document.getElementById('slide-in-code');
const applyCodeBtn = document.getElementById('apply-code-btn');
const titleInput = document.getElementById('title');
const titleDisplay = document.getElementById('title-display');
const codeToggleBtn = document.querySelector('.code-toggle-btn[data-target="title"]');

if (titleDisplay && codeToggleBtn) {
    // Sync display field naar hidden field bij input
    titleDisplay.addEventListener('input', () => {
        const newText = titleDisplay.value;
        const currentHtml = titleInput.value;
        
        // Als er HTML tags zijn, laat de HTML volledig intact
        // Alleen via de code editor kunnen HTML wijzigingen worden gemaakt
        if (currentHtml.includes('<') && currentHtml.includes('>')) {
            // Doe niets - HTML kan alleen via code editor worden aangepast
            return;
        } else {
            // Geen HTML tags, gewoon normale tekst sync
            titleInput.value = newText;
        }
    });
    
    // Toon icoon bij focus op display field
    titleDisplay.addEventListener('focus', () => {
        codeToggleBtn.style.opacity = '1';
    });
    
    // Verberg icoon bij blur
    titleDisplay.addEventListener('blur', () => {
        setTimeout(() => {
            if (!slideIn || slideIn.style.right !== '0px') {
                codeToggleBtn.style.opacity = '0';
            }
        }, 200);
    });
    
    // Open popup alleen bij klik op code button
    codeToggleBtn.addEventListener('click', () => {
        slideIn.style.display = 'block';
        slideIn.style.right = '0';
        slideInCode.value = titleInput.value; // Volledige HTML code uit hidden field
        codeToggleBtn.style.opacity = '1';
    });
}

// Sluit popup
if (slideInClose) {
    slideInClose.addEventListener('click', () => {
        slideIn.style.right = '-400px';
        setTimeout(() => {
            slideIn.style.display = 'none';
        }, 300);
    });
}

// Tab support in code editor
if (slideInCode) {
    slideInCode.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = slideInCode.selectionStart;
            const end = slideInCode.selectionEnd;
            const value = slideInCode.value;
            
            // Insert 2 spaces instead of tab
            slideInCode.value = value.substring(0, start) + '  ' + value.substring(end);
            slideInCode.selectionStart = slideInCode.selectionEnd = start + 2;
        }
    });
}

// Code formatter functie
const formatCodeBtn = document.getElementById('format-code-btn');
if (formatCodeBtn) {
    formatCodeBtn.addEventListener('click', () => {
        const code = slideInCode.value;
        try {
            // Simpele HTML formatter
            const formatted = formatHTML(code);
            slideInCode.value = formatted;
        } catch (e) {
            console.error('Formatting error:', e);
        }
    });
}

function formatHTML(html) {
    let formatted = '';
    let indent = 0;
    
    html.split(/(<[^>]+>)/g).forEach(node => {
        if (node.trim()) {
            // Closing tag
            if (node.match(/^<\/\w/)) {
                indent = Math.max(0, indent - 1);
            }
            
            // Add indentation
            formatted += '  '.repeat(indent) + node.trim() + '\n';
            
            // Opening tag (not self-closing)
            if (node.match(/^<\w[^>]*[^\/]>$/)) {
                indent++;
            }
        }
    });
    
    return formatted.trim();
}

// Pas code toe
if (applyCodeBtn) {
    applyCodeBtn.addEventListener('click', () => {
        // Aggressive minify HTML - verwijder ALLE onnodige whitespace
        let code = slideInCode.value;
        
        // Verwijder newlines, tabs, en multiple spaces
        code = code.replace(/\n/g, '');
        code = code.replace(/\t/g, '');
        code = code.replace(/\r/g, '');
        // Verwijder alle whitespace tussen tags
        code = code.replace(/>\s+</g, '><');
        // Verwijder leading/trailing whitespace
        code = code.trim();
        // Verwijder multiple spaces binnen tekst naar single space
        code = code.replace(/\s{2,}/g, ' ');
        
        // Update hidden field met volledig compacte HTML code
        titleInput.value = code;
        // Update display field met alleen tekst (strip HTML tags)
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = code;
        titleDisplay.value = tempDiv.textContent || tempDiv.innerText || '';
        
        if (slideIn) {
            slideIn.style.right = '-400px';
            setTimeout(() => {
                slideIn.style.display = 'none';
            }, 300);
        }
        isUpdated = true;
    });
}

// Unsaved changes detection
let isUpdated = false;
let pendingHref = null;

const unsavedAlert = document.getElementById('unsaved-alert');
const stayBtn = document.getElementById('stay-here');

document.querySelectorAll('input, textarea, select').forEach(input => {
    input.addEventListener('input', () => {
        isUpdated = true;
    });
});

document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', (e) => {
        if (isUpdated) {
            e.preventDefault();
            pendingHref = link.href;
            unsavedAlert.style.display = 'block';
        }
    });
});

if (stayBtn) {
    stayBtn.addEventListener('click', () => {
        unsavedAlert.style.display = 'none';
        pendingHref = null;
    });
}

if (leaveBtn) {
    leaveBtn.addEventListener('click', () => {
        window.location.href = pendingHref;
    });
}

document.querySelector('form')?.addEventListener('submit', () => {
    isUpdated = false;
    unsavedAlert.style.display = 'none';
});
</script>

<?php include '../includes/footer.php'; ?>
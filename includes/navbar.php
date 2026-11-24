<?php
$currentSection = $GET['section'] ?? 'dashboard';

function navActive($section, $currentSection){
    return $section === $currentSection ? 'active' : '';

}


?>

<!-- Material Icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    .app-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:2rem;
        flex-wrap:wrap;
        gap: 1rem;
        font-family: Roboto, system-ui, -apple-system, sans-serif;
    }
    .app-header h1{
        font-weight:400;
        font-size:1.8rem;
        display:flex;
        align-items:center;
        gap:0.5rem;
        color:#212121;
        margin:0;
    }

    .app-header h1 .material-icons{
        font-size:2.2rem;
        color: #1976d2; /* Primary Color */
    }
    
    .nav-links{
        display:flex;
        gap:0.25rem;
        background:transparent;
    }

    .nav-links a{
        text-decoration:none;
        color:#616161;
        font-size:0.9rem;
        font-weight:500;
        text-transform:uppercase;
        letter-spacing:0.5px;
        padding: 0.6rem 1.2rem;
        border-radius:4px;
        transition: background-color 0.2s, color 0.2s;
        display:flex;
        align-items:center;
        gap:0.35rem;     
    }

    .nav-links a .material-icon{
        font-size:1.2rem;
    }

    .nav-links a:hover{
        background:#e3f2fd;
        color:#1976d2;
    }

    .nav-links a.active{
        color:#1976d2;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    }

    .nav-links a.active .material-icons{
        color:#1976d2;
    }

    @media (max-width:760px){
        .app-header{
            flex-direction:column;
            align-items:flex-start;
        }
        .nav-links{
            width:100%;
            overflow-x:auto;
            padding-bottom:0.5rem;
        }

        .nav-links a{
            padding: 0.5rem 0.8rem;
            font-size: .8rem;
            white-space:nowrap;
        }
    }
    
</style>

<header class="app-header">
    <h1>
        <span class="material-icons">local_library</span>
        Library Dashboard
    </h1>

    <nav class="nav-links">
        <a href="index.php?section=dashboard" class="<?= navActive('dashboard', $currentSection) ?>">
            <span class="material-icons">dashboard</span>
            Dashboard
        </a>
        <a href="index.php?section=dashboard" class="<?= navActive('students', $currentSection) ?>">
            <span class="material-icons">people</span>
            Students
        </a>
        <a href="index.php?section=dashboard" class="<?= navActive('books', $currentSection) ?>">
            <span class="material-icons">menu_book</span>
            Books
        </a>
        <a href="index.php?section=dashboard" class="<?= navActive('Borrow', $currentSection) ?>">
            <span class="material-icons">swap_horiz</span>
            Borrow
        </a>
    </nav>


</header>


<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    (function() {
        // Materialize standard palette
        const colors = {
            blue: '#1976d2',
            green: '#4caf50',
            orange: '#ff9800',
            red: '#f44336',
            purple: '#9c27b0',
            grey: '#9e9e9e'
        };

        // ---------- DOUGHNUT : BOOKS BY CATEGORY ----------
        const catCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(catCtx, {
            type: 'doughnut',
            data: {
                labels: <?= json_encode($categories) ?>,
                datasets: [{
                    data: <?= json_encode($categoryCounts) ?>,
                    backgroundColor: [
                        colors.blue, colors.green, colors.orange, colors.red, colors.purple, colors.grey
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            boxHeight: 12,
                            usePointStyle: false, // Materialize usually uses squares
                            padding: 16,
                            font: { size: 12, family: 'Roboto' },
                            color: '#616161'
                        }
                    },
                    tooltip: {
                        backgroundColor: '#212121',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        padding: 10,
                        cornerRadius: 4,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const pct = total > 0 ? ((value / total) * 100).toFixed(0) : 0;
                                return ` ${label}: ${value} (${pct}%)`;
                            }
                        }
                    }
                }
            }
        });
    })();
</script>
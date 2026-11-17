<?php

require_once __DIR__ . '/includes/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
    <?php include 'includes/navbar.php' ?>
    <!-- CHARTS -->
<div class="charts-grid">

    <!-- Pie Chart - Book Categories-->
    <div class="chart-card">
        <div class="chart-title">
            Books by category
            <span>
                <span class="material-icons">category</span>
                collection
            </span>
        </div>
        <canvas id="categoryChart" width="400" height="200"></canvas>
    </div>


    <div class="stats-grid">
        
    <div class="stat-card">
        
        <div class="stat-header">
            <span class="stat-label">Students</span>
            <span class="material-icons">school</span>
        </div>
        <div class="stat-number"><?= $studentCount ?></div>
        <div class="stat-sub">enrolled</div>
    </div>
    

    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Books</span>
            <span class="material-icons">auto_stories</span>
        </div>
        <div class="stat-number"><?= $bookCount ?></div>
        <div class="stat-sub">in collection</div>
    </div>

    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Borrow records</span>
            <span class="material-icons">history</span>
        </div>
        <div class="stat-number"><?= $totalBorrows ?></div>
        <div class="stat-sub">all time</div>
    </div>

    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Active loans</span>
            <span class="material-icons">pending_actions</span>
        </div>
        <div class="stat-number"><?= $activeBorrows ?></div>
        <div class="stat-sub">not returned</div>
    </div>
    
</div>
</body>

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

</html>
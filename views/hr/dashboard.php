

<div class="dashboard-grid">
    <div class="quick-actions">
        <h3>Быстрые действия</h3>
        <div class="action-buttons">
            <a href="<?= app()->route->getUrl('/employees/create') ?>" class="action-btn primary">
                <span>➕</span>
                Добавить сотрудника
            </a>
            <a href="<?= app()->route->getUrl('/divisions/create') ?>" class="action-btn secondary">
                <span>🏢</span>
                Добавить подразделение
            </a>
            <a href="<?= app()->route->getUrl('/employee/by_category') ?>" class="action-btn success">
                <span>👥</span>
                Сотрудники по составу
            </a>
        </div>
    </div>

    <div class="stats-section">
        <h3>Статистика по подразделениям</h3>
        <div class="stats-grid">
            <?php foreach ($divisions as $division): ?>
                <div class="stat-card">
                    <h4><?= htmlspecialchars($division->division_name) ?></h4>
                    <div class="stat-numbers">
                        <div class="stat-item">
                            <span class="label">Сотрудников:</span>
                            <span class="value"><?= $division->employee_count ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="label">Средний возраст:</span>
                            <span class="value"><?= $division->average_age ?? '—' ?></span>
                        </div>
                    </div>
                    <a href="/pop-it-mvc/divisions/show?id=<?= $division->division_id ?>" class="view-details">
                        Подробнее →
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .dashboard-grid {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .quick-actions {
        margin-bottom: 40px;
    }

    .quick-actions h3 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 1.5em;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .action-btn {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .action-btn.primary {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
    }

    .action-btn.secondary {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
        color: white;
    }

    .action-btn.success {
        background: linear-gradient(135deg, #27ae60, #229954);
        color: white;
    }

    .action-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .action-btn span {
        font-size: 1.5em;
    }

    .stats-section h3 {
        color: #2c3e50;
        margin-bottom: 25px;
        font-size: 1.5em;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #3498db;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .stat-card h4 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.2em;
    }

    .stat-numbers {
        margin-bottom: 15px;
    }

    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
        padding: 8px 0;
        border-bottom: 1px solid #f1f2f6;
    }

    .stat-item:last-child {
        border-bottom: none;
    }

    .stat-item .label {
        color: #7f8c8d;
        font-size: 0.9em;
    }

    .stat-item .value {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.1em;
    }

    .view-details {
        display: inline-block;
        color: #3498db;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 5px 0;
    }

    .view-details:hover {
        color: #2980b9;
        transform: translateX(5px);
    }

    @media (max-width: 768px) {
        .dashboard-grid {
            padding: 10px;
        }

        .action-buttons {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 20px;
        }
    }
</style>
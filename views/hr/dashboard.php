<div class="dashboard">
    <div class="dashboard-header">
        <h1>Дашборд HR</h1>
        <p>Обзор системы управления персоналом</p>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon primary">
                👥
            </div>
            <div class="stat-content">
                <div class="stat-number"><?= $total_employees ?? '0' ?></div>
                <div class="stat-label">Всего сотрудников</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">
                🏢
            </div>
            <div class="stat-content">
                <div class="stat-number"><?= $total_divisions ?? '0' ?></div>
                <div class="stat-label">Подразделений</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon warning">
                💼
            </div>
            <div class="stat-content">
                <div class="stat-number"><?= $total_positions ?? '0' ?></div>
                <div class="stat-label">Должностей</div>
            </div>
        </div>
    </div>

    <div class="actions-section">
        <h2>Быстрые действия</h2>
        <div class="actions-grid">
            <a href="<?= app()->route->getUrl('/employees/create') ?>" class="action-card">
                <div class="action-icon primary">➕</div>
                <div class="action-content">
                    <h3>Добавить сотрудника</h3>
                    <p>Создание новой записи сотрудника</p>
                </div>
            </a>

            <a href="<?= app()->route->getUrl('/divisions/create') ?>" class="action-card">
                <div class="action-icon success">🏢</div>
                <div class="action-content">
                    <h3>Добавить подразделение</h3>
                    <p>Создание нового подразделения</p>
                </div>
            </a>

            <a href="<?= app()->route->getUrl('/employee/by_category') ?>" class="action-card">
                <div class="action-icon warning">👥</div>
                <div class="action-content">
                    <h3>Сотрудники по составу</h3>
                    <p>Фильтрация по категориям</p>
                </div>
            </a>
        </div>
    </div>

    <?php if (!empty($divisions)): ?>
        <div class="divisions-section">
            <h2>Статистика подразделений</h2>
            <div class="divisions-grid">
                <?php foreach ($divisions as $division): ?>
                    <div class="division-card">
                        <h3><?= htmlspecialchars($division->division_name) ?></h3>
                        <div class="division-stats">
                            <div class="division-stat">
                                <span class="stat-value"><?= $division->employee_count ?></span>
                                <span class="stat-label">сотрудников</span>
                            </div>
                            <div class="division-stat">
                                <span class="stat-value"><?= $division->average_age ?? '—' ?></span>
                                <span class="stat-label">средний возраст</span>
                            </div>
                        </div>
                        <a href="/pop-it-mvc/divisions/show?id=<?= $division->division_id ?>" class="btn btn-outline btn-sm">
                            Подробнее
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .dashboard {
        max-width: 1200px;
        margin: 0 auto;
    }

    .dashboard-header {
        margin-bottom: 32px;
    }

    .dashboard-header h1 {
        font-size: 32px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
    }

    .dashboard-header p {
        color: var(--text-light);
        font-size: 16px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--card-bg);
        padding: 24px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .stat-icon.primary {
        background: #EFF6FF;
        color: var(--primary);
    }

    .stat-icon.success {
        background: #ECFDF5;
        color: var(--success);
    }

    .stat-icon.warning {
        background: #FFFBEB;
        color: var(--warning);
    }

    .stat-number {
        font-size: 28px;
        font-weight: 600;
        color: var(--text);
        line-height: 1;
    }

    .stat-label {
        color: var(--text-light);
        font-size: 14px;
        margin-top: 4px;
    }

    .actions-section {
        margin-bottom: 40px;
    }

    .actions-section h2 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 20px;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .action-card {
        background: var(--card-bg);
        padding: 24px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        text-decoration: none;
        color: inherit;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .action-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-2px);
        border-color: var(--primary);
    }

    .action-icon {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .action-icon.primary {
        background: #EFF6FF;
        color: var(--primary);
    }

    .action-icon.success {
        background: #ECFDF5;
        color: var(--success);
    }

    .action-icon.warning {
        background: #FFFBEB;
        color: var(--warning);
    }

    .action-content h3 {
        font-size: 16px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 4px;
    }

    .action-content p {
        color: var(--text-light);
        font-size: 14px;
    }

    .divisions-section h2 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 20px;
    }

    .divisions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .division-card {
        background: var(--card-bg);
        padding: 24px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
    }

    .division-card h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 16px;
    }

    .division-stats {
        display: flex;
        gap: 24px;
        margin-bottom: 20px;
    }

    .division-stat {
        text-align: center;
    }

    .stat-value {
        display: block;
        font-size: 24px;
        font-weight: 600;
        color: var(--text);
    }

    .stat-label {
        display: block;
        color: var(--text-light);
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-outline {
        background: transparent;
        border: 1px solid var(--border);
        color: var(--text);
    }

    .btn-outline:hover {
        background: var(--bg);
        border-color: var(--text-light);
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }

        .divisions-grid {
            grid-template-columns: 1fr;
        }

        .division-stats {
            flex-direction: column;
            gap: 16px;
        }
    }
</style>
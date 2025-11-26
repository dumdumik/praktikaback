<div class="page-container">
    <div class="page-header">
        <h1>Подробности подразделения</h1>
        <p>Информация о подразделении и его сотрудниках</p>
    </div>

    <?php if (isset($division) && $division): ?>
        <div class="division-overview">
            <!-- Статистика подразделения -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon primary">🏢</div>
                    <div class="stat-content">
                        <div class="stat-number"><?= htmlspecialchars($division->division_name) ?></div>
                        <div class="stat-label">Название подразделения</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon success">👥</div>
                    <div class="stat-content">
                        <div class="stat-number"><?= $division->employee_count ?? 0 ?></div>
                        <div class="stat-label">Количество сотрудников</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon warning">📊</div>
                    <div class="stat-content">
                        <div class="stat-number"><?= $division->average_age ?? '—' ?></div>
                        <div class="stat-label">Средний возраст</div>
                    </div>
                </div>

                <?php if ($division->type): ?>
                    <div class="stat-card">
                        <div class="stat-icon info">🔧</div>
                        <div class="stat-content">
                            <div class="stat-number"><?= htmlspecialchars($division->type->division_type_name) ?></div>
                            <div class="stat-label">Тип подразделения</div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Сотрудники подразделения -->
            <div class="section">
                <div class="section-header">
                    <h2>Сотрудники подразделения</h2>
                    <div class="section-actions">
                        <a href="<?= app()->route->getUrl('/employees/create') ?>" class="btn btn-primary">
                            Добавить сотрудника
                        </a>
                    </div>
                </div>

                <?php if (isset($employees) && $employees->count() > 0): ?>
                    <div class="table-container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Должность</th>
                                <th>Состав</th>
                                <th>Адрес регистрации</th>
                                <th>Дата рождения</th>
                                <th>Возраст</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td class="employee-name">
                                        <div class="name-primary"><?= htmlspecialchars($employee->last_name) ?></div>
                                        <div class="name-secondary">
                                            <?= htmlspecialchars($employee->first_name) ?> <?= htmlspecialchars($employee->middle_name) ?>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($employee->position->position_name ?? '—') ?></td>
                                    <td>
                                        <span class="badge badge-success">
                                            <?= htmlspecialchars($employee->staffCategory->staff_category_name ?? '—') ?>
                                        </span>
                                    </td>
                                    <td class="text-sm"><?= htmlspecialchars($employee->registration_address ?? '—') ?></td>
                                    <td><?= date('d.m.Y', strtotime($employee->birth_date)) ?></td>
                                    <td>
                                        <span class="badge">
                                            <?= (new DateTime($employee->birth_date))->diff(new DateTime())->y ?> лет
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="/pop-it-mvc/employee/change_division?id=<?= $employee->id ?>"
                                               class="btn-action"
                                               title="Изменить подразделение">
                                                🔄
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <div class="empty-icon">👥</div>
                        <h3>Сотрудники не найдены</h3>
                        <p>В этом подразделении пока нет сотрудников</p>
                        <a href="<?= app()->route->getUrl('/employees/create') ?>" class="btn btn-primary">
                            Добавить первого сотрудника
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <div class="empty-icon">❌</div>
            <h3>Подразделение не найдено</h3>
            <p>Запрошенное подразделение не существует или было удалено</p>
            <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-primary">
                Вернуться к дашборду
            </a>
        </div>
    <?php endif; ?>

    <div class="page-actions">
        <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-outline">
            Назад к списку подразделений
        </a>
    </div>
</div>

<style>
    .division-overview {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
        margin-bottom: 24px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 32px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.95);
        padding: 24px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: var(--shadow);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
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

    .stat-icon.info {
        background: #F0F9FF;
        color: #0EA5E9;
    }

    .stat-number {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 4px;
    }

    .stat-label {
        color: var(--text-light);
        font-size: 14px;
    }

    .section {
        padding: 32px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .section-header h2 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text);
        margin: 0;
    }

    .employee-name {
        min-width: 200px;
    }

    .name-primary {
        font-weight: 600;
        color: var(--text);
        margin-bottom: 2px;
    }

    .name-secondary {
        color: var(--text-light);
        font-size: 13px;
    }

    .text-sm {
        font-size: 13px;
        color: var(--text-light);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        padding: 8px;
        border: none;
        border-radius: 6px;
        background: var(--bg);
        color: var(--text);
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .btn-action:hover {
        background: var(--primary);
        color: white;
        transform: scale(1.1);
    }

    .page-actions {
        text-align: center;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
            padding: 24px;
        }

        .section {
            padding: 24px;
        }

        .section-header {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
        }

        .stat-card {
            padding: 20px;
        }

        .table {
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            padding: 16px;
        }

        .section {
            padding: 20px;
        }

        .stat-card {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
    }
</style>
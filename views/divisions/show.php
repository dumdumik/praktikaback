<div class="container">
    <div class="page-header">
        <h2>Подробности подразделения</h2>
        <p>Информация о подразделении и его сотрудниках</p>
    </div>

    <?php if (isset($division) && $division): ?>
        <div class="division-dashboard">
            <!-- Основная информация -->
            <div class="info-cards">
                <div class="info-card primary">
                    <div class="card-icon">🏢</div>
                    <div class="card-content">
                        <h3><?= htmlspecialchars($division->division_name) ?></h3>
                        <p>Название подразделения</p>
                    </div>
                </div>

                <div class="info-card success">
                    <div class="card-icon">👥</div>
                    <div class="card-content">
                        <h3><?= $division->employee_count ?? 0 ?></h3>
                        <p>Количество сотрудников</p>
                    </div>
                </div>

                <div class="info-card warning">
                    <div class="card-icon">📊</div>
                    <div class="card-content">
                        <h3><?= $division->average_age ?? '—' ?></h3>
                        <p>Средний возраст</p>
                    </div>
                </div>

                <?php if ($division->type): ?>
                    <div class="info-card info">
                        <div class="card-icon">🔧</div>
                        <div class="card-content">
                            <h3><?= htmlspecialchars($division->type->division_type_name) ?></h3>
                            <p>Тип подразделения</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Сотрудники подразделения -->
            <div class="employees-section">
                <div class="section-header">
                    <h3>Сотрудники подразделения</h3>
                    <div class="section-actions">
                        <a href="<?= app()->route->getUrl('/employees/create') ?>" class="btn btn-primary">
                            ➕ Добавить сотрудника
                        </a>
                    </div>
                </div>

                <?php if (isset($employees) && $employees->count() > 0): ?>
                    <div class="table-container">
                        <table class="modern-table">
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
                                        <strong><?= htmlspecialchars($employee->last_name) ?></strong><br>
                                        <?= htmlspecialchars($employee->first_name) ?>
                                        <?= htmlspecialchars($employee->middle_name) ?>
                                    </td>
                                    <td><?= htmlspecialchars($employee->position->position_name ?? '—') ?></td>
                                    <td>
                                    <span class="category-tag">
                                        <?= htmlspecialchars($employee->staffCategory->staff_category_name ?? '—') ?>
                                    </span>
                                    </td>
                                    <td><?= htmlspecialchars($employee->registration_address ?? '—') ?></td>
                                    <td><?= date('d.m.Y', strtotime($employee->birth_date)) ?></td>
                                    <td>
                                    <span class="age-badge">
                                        <?= (new DateTime($employee->birth_date))->diff(new DateTime())->y ?> лет
                                    </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="/pop-it-mvc/employee/change_division?id=<?= $employee->id ?>"
                                               class="btn-action change"
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
                            ➕ Добавить первого сотрудника
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
                📊 Вернуться к дашборду
            </a>
        </div>
    <?php endif; ?>

    <div class="back-actions">
        <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-secondary">
            ← Назад к списку подразделений
        </a>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-header h2 {
        color: #2c3e50;
        font-size: 2.2em;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .page-header p {
        color: #7f8c8d;
        font-size: 1.1em;
    }

    .division-dashboard {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .info-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 30px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .info-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 25px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
    }

    .card-icon {
        font-size: 2.5em;
        flex-shrink: 0;
    }

    .card-content h3 {
        color: #2c3e50;
        margin-bottom: 5px;
        font-size: 1.5em;
        font-weight: 600;
    }

    .card-content p {
        color: #7f8c8d;
        margin: 0;
        font-size: 0.9em;
    }

    .employees-section {
        padding: 30px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f1f2f6;
    }

    .section-header h3 {
        color: #2c3e50;
        font-size: 1.5em;
        font-weight: 600;
        margin: 0;
    }

    .btn {
        padding: 12px 25px;
        border: none;
        border-radius: 10px;
        font-size: 1em;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #27ae60, #229954);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3);
    }

    .btn-secondary {
        background: #95a5a6;
        color: white;
    }

    .btn-secondary:hover {
        background: #7f8c8d;
        transform: translateY(-2px);
    }

    .table-container {
        overflow-x: auto;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .modern-table thead {
        background: #3498db;
        color: white;
    }

    .modern-table th {
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 0.9em;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .modern-table tbody tr {
        border-bottom: 1px solid #e9ecef;
        transition: background-color 0.2s ease;
    }

    .modern-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .modern-table td {
        padding: 15px 20px;
        color: #2c3e50;
        vertical-align: top;
    }

    .employee-name {
        font-weight: 500;
        color: #2c3e50;
        min-width: 200px;
    }

    .employee-name strong {
        color: #2c3e50;
        display: block;
        margin-bottom: 2px;
    }

    .category-tag {
        background: #e1f7ed;
        color: #27ae60;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85em;
        font-weight: 600;
        display: inline-block;
    }

    .age-badge {
        background: #e1f0fa;
        color: #3498db;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85em;
        font-weight: 600;
        display: inline-block;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
    }

    .btn-action {
        padding: 8px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
        font-size: 1.1em;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-action.change {
        background: #fff3cd;
        color: #856404;
    }

    .btn-action.change:hover {
        background: #ffeaa7;
        transform: scale(1.1);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #f8f9fa;
        border-radius: 15px;
        margin: 20px 0;
    }

    .empty-icon {
        font-size: 4em;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state h3 {
        color: #2c3e50;
        margin-bottom: 10px;
        font-size: 1.5em;
    }

    .empty-state p {
        color: #7f8c8d;
        margin-bottom: 25px;
        font-size: 1.1em;
    }

    .back-actions {
        text-align: center;
        margin-top: 30px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .info-cards {
            grid-template-columns: 1fr;
            padding: 20px;
        }

        .employees-section {
            padding: 20px;
        }

        .section-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .modern-table {
            font-size: 0.9em;
        }

        .modern-table th,
        .modern-table td {
            padding: 10px 15px;
        }

        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }
    }

    @media (max-width: 480px) {
        .page-header h2 {
            font-size: 1.8em;
        }

        .info-card {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .card-icon {
            font-size: 2em;
        }

        .empty-state {
            padding: 40px 15px;
        }

        .empty-icon {
            font-size: 3em;
        }
    }
</style>
<div class="page-container">
    <div class="page-header">
        <h1>Сотрудники по составу</h1>
        <p>Фильтрация сотрудников по категориям персонала</p>
    </div>

    <div class="filter-card">
        <form method="GET" class="filter-form">
            <div class="form-group">
                <label for="category_id">Категория персонала</label>
                <div class="input-wrapper">
                    <select id="category_id" name="category_id" required>
                        <option value="">Выберите категорию персонала</option>
                        <?php foreach ($categories as $staff_category): ?>
                            <option value="<?= $staff_category->staff_category_id ?>" <?= ($selected_category_id ?? '') == $staff_category->staff_category_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($staff_category->staff_category_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Показать сотрудников
            </button>
        </form>
    </div>

    <?php if (!empty($employees)): ?>
        <div class="results-card">
            <div class="results-header">
                <h2>Результаты поиска</h2>
                <div class="results-meta">
                    <span class="results-count">Найдено сотрудников: <?= count($employees) ?></span>
                    <button class="btn btn-outline btn-sm" onclick="window.print()">
                        Печать
                    </button>
                </div>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Дата рождения</th>
                        <th>Возраст</th>
                        <th>Должность</th>
                        <th>Состав</th>
                        <th>Подразделение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td class="employee-name">
                                <strong><?= htmlspecialchars($employee->last_name) ?></strong>
                                <?= htmlspecialchars($employee->first_name) ?>
                                <?= htmlspecialchars($employee->middle_name) ?>
                            </td>
                            <td><?= date('d.m.Y', strtotime($employee->birth_date)) ?></td>
                            <td>
                                <span class="badge">
                                    <?= (new DateTime($employee->birth_date))->diff(new DateTime())->y ?> лет
                                </span>
                            </td>
                            <td><?= htmlspecialchars($employee->position ? $employee->position->position_name : 'Не указана') ?></td>
                            <td>
                                <span class="badge badge-success">
                                    <?= htmlspecialchars($employee->staffCategory ? $employee->staffCategory->staff_category_name : 'Не указана') ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($employee->division ? $employee->division->division_name : 'Не указано') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php elseif ($selected_category_id): ?>
        <div class="empty-state">
            <div class="empty-icon">👥</div>
            <h3>Сотрудники не найдены</h3>
            <p>В выбранной категории нет сотрудников</p>
            <a href="<?= app()->route->getUrl('/employees/create') ?>" class="btn btn-primary">
                Добавить сотрудника
            </a>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <div class="empty-icon">🔍</div>
            <h3>Выберите категорию</h3>
            <p>Выберите категорию персонала для отображения сотрудников</p>
        </div>
    <?php endif; ?>
</div>

<style>
    .page-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .filter-card {
        background: var(--card-bg);
        padding: 24px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        margin-bottom: 24px;
    }

    .filter-form {
        display: flex;
        gap: 16px;
        align-items: flex-end;
    }

    .filter-form .form-group {
        flex: 1;
        margin: 0;
    }

    .results-card {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 24px;
        background: var(--bg);
        border-bottom: 1px solid var(--border);
    }

    .results-header h2 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text);
        margin: 0;
    }

    .results-meta {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .results-count {
        color: var(--text-light);
        font-size: 14px;
    }

    .table-container {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th {
        background: var(--bg);
        padding: 12px 16px;
        text-align: left;
        font-weight: 600;
        color: var(--text);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid var(--border);
    }

    .table td {
        padding: 16px;
        border-bottom: 1px solid var(--border-light);
        color: var(--text);
    }

    .table tbody tr:hover {
        background: var(--bg);
    }

    .employee-name {
        font-weight: 500;
    }

    .employee-name strong {
        color: var(--text);
    }

    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        background: var(--bg);
        color: var(--text);
    }

    .badge-success {
        background: #ECFDF5;
        color: #065F46;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
    }

    .empty-icon {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.5;
    }

    .empty-state h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
    }

    .empty-state p {
        color: var(--text-light);
        margin-bottom: 24px;
    }

    @media (max-width: 768px) {
        .filter-form {
            flex-direction: column;
            align-items: stretch;
        }

        .results-header {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
        }

        .results-meta {
            width: 100%;
            justify-content: space-between;
        }

        .table {
            font-size: 13px;
        }

        .table th,
        .table td {
            padding: 12px;
        }
    }
</style>
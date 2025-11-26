<div class="container">
    <div class="page-header">
        <h2>Выбор сотрудников по составу</h2>
        <p>Фильтрация сотрудников по категориям персонала</p>
    </div>

    <div class="filter-card">
        <form method="GET" class="filter-form">
            <div class="form-group">
                <div class="input-wrapper select-wrapper">
                    <select id="category_id" name="category_id" required>
                        <option value="">Выберите категорию персонала</option>
                        <?php foreach ($categories as $staff_category): ?>
                            <option value="<?= $staff_category->staff_category_id ?>"
                                <?= ($selected_category_id ?? '') == $staff_category->staff_category_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($staff_category->staff_category_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="category_id">Категория персонала</label>
                    <span class="input-icon">👥</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <span>🔍 Показать сотрудников</span>
            </button>
        </form>
    </div>

    <?php if (!empty($employees)): ?>
        <div class="results-section">
            <div class="results-header">
                <h3>Найдено сотрудников: <?= count($employees) ?></h3>
                <div class="export-actions">
                    <button class="btn btn-secondary" onclick="window.print()">
                        🖨️ Печать
                    </button>
                </div>
            </div>

            <div class="table-container">
                <table class="modern-table">
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
                                <span class="age-badge">
                                    <?= (new DateTime($employee->birth_date))->diff(new DateTime())->y ?> лет
                                </span>
                            </td>
                            <td>
                                <?= htmlspecialchars($employee->position ? $employee->position->position_name : 'Не указана') ?>
                            </td>
                            <td>
                                <span class="category-tag">
                                    <?= htmlspecialchars($employee->staffCategory ? $employee->staffCategory->staff_category_name : 'Не указана') ?>
                                </span>
                            </td>
                            <td>
                                <?= htmlspecialchars($employee->division ? $employee->division->division_name : 'Не указано') ?>
                            </td>
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
                ➕ Добавить сотрудника
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

    .filter-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .filter-form {
        display: flex;
        gap: 20px;
        align-items: flex-end;
    }

    .filter-form .form-group {
        flex: 1;
        margin: 0;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper select {
        width: 100%;
        padding: 15px 45px 15px 15px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 1em;
        background: #f8f9fa;
        transition: all 0.3s ease;
        appearance: none;
        cursor: pointer;
    }

    .select-wrapper::after {
        content: '▼';
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #95a5a6;
        font-size: 0.8em;
        pointer-events: none;
    }

    .input-wrapper select:focus {
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        outline: none;
    }

    .input-wrapper label {
        position: absolute;
        top: -10px;
        left: 15px;
        background: white;
        padding: 0 8px;
        font-size: 0.8em;
        color: #3498db;
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .input-icon {
        position: absolute;
        right: 35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2em;
        color: #95a5a6;
    }

    .btn {
        padding: 15px 25px;
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
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
    }

    .btn-secondary {
        background: #95a5a6;
        color: white;
    }

    .btn-secondary:hover {
        background: #7f8c8d;
        transform: translateY(-2px);
    }

    .results-section {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 30px;
        background: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
    }

    .results-header h3 {
        color: #2c3e50;
        margin: 0;
        font-size: 1.3em;
    }

    .export-actions {
        display: flex;
        gap: 10px;
    }

    .table-container {
        overflow-x: auto;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
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
    }

    .employee-name {
        font-weight: 500;
        color: #2c3e50;
    }

    .employee-name strong {
        color: #2c3e50;
    }

    .age-badge {
        background: #e1f0fa;
        color: #3498db;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85em;
        font-weight: 600;
    }

    .category-tag {
        background: #e1f7ed;
        color: #27ae60;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85em;
        font-weight: 600;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .filter-form {
            flex-direction: column;
            gap: 15px;
        }

        .results-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .export-actions {
            width: 100%;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }

        .modern-table {
            font-size: 0.9em;
        }

        .modern-table th,
        .modern-table td {
            padding: 10px 15px;
        }
    }

    @media (max-width: 480px) {
        .page-header h2 {
            font-size: 1.8em;
        }

        .filter-card {
            padding: 20px;
        }

        .empty-state {
            padding: 40px 15px;
        }

        .empty-icon {
            font-size: 3em;
        }
    }
</style>
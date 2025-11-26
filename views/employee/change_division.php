<div class="container">
    <div class="form-card">
        <div class="form-header">
            <h2>Изменение подразделения сотрудника</h2>
            <p>Перенос сотрудника в другое подразделение</p>
        </div>

        <?php if (isset($message) && $message): ?>
            <div class="alert alert-error">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <?php if (isset($employee) && $employee): ?>
            <div class="employee-info">
                <div class="employee-card">
                    <div class="employee-avatar">
                        <?= strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) ?>
                    </div>
                    <div class="employee-details">
                        <h3><?= htmlspecialchars($employee->getFullNameAttribute()) ?></h3>
                        <div class="employee-meta">
                        <span class="meta-item">
                            <strong>Текущее подразделение:</strong>
                            <?= htmlspecialchars($employee->division->division_name ?? 'Не указано') ?>
                        </span>
                            <span class="meta-item">
                            <strong>Должность:</strong>
                            <?= htmlspecialchars($employee->position->position_name ?? 'Не указана') ?>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form method="POST" class="modern-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-group">
                <div class="input-wrapper select-wrapper">
                    <select id="division_id" name="division_id" required>
                        <option value="">Выберите новое подразделение</option>
                        <?php foreach ($divisions as $division): ?>
                            <option value="<?= $division->division_id ?>"
                                <?= ($old['division_id'] ?? '') == $division->division_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($division->division_name) ?>
                                <?php if ($division->employee_count): ?>
                                    (<?= $division->employee_count ?> сотрудников)
                                <?php endif; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="division_id">Новое подразделение</label>
                    <span class="input-icon">🏢</span>
                </div>
                <div class="input-hint">Выберите подразделение для перевода сотрудника</div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <span>✅ Сохранить изменения</span>
                </button>
                <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-secondary">Отмена</a>
            </div>
        </form>
    </div>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        padding: 40px;
        border: 1px solid #e1e8ed;
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h2 {
        color: #2c3e50;
        font-size: 2em;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .form-header p {
        color: #7f8c8d;
        font-size: 1.1em;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        font-weight: 500;
        text-align: center;
    }

    .alert-error {
        background: #ffeaea;
        color: #e74c3c;
        border: 1px solid #f5b7b1;
    }

    .employee-info {
        margin-bottom: 40px;
    }

    .employee-card {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 25px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 15px;
        border-left: 5px solid #3498db;
    }

    .employee-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3498db, #2980b9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3em;
        font-weight: bold;
        color: white;
        flex-shrink: 0;
    }

    .employee-details h3 {
        color: #2c3e50;
        margin-bottom: 8px;
        font-size: 1.4em;
        font-weight: 600;
    }

    .employee-meta {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .meta-item {
        color: #7f8c8d;
        font-size: 0.95em;
    }

    .meta-item strong {
        color: #2c3e50;
    }

    .modern-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .form-group {
        position: relative;
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

    .input-hint {
        font-size: 0.85em;
        color: #7f8c8d;
        margin-top: 8px;
        margin-left: 5px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #f1f2f6;
    }

    .btn {
        padding: 12px 30px;
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

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .form-card {
            padding: 30px 20px;
        }

        .employee-card {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .employee-meta {
            align-items: center;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .form-card {
            padding: 25px 15px;
        }

        .form-header h2 {
            font-size: 1.6em;
        }

        .employee-avatar {
            width: 50px;
            height: 50px;
            font-size: 1.1em;
        }
    }
</style>
<div class="page-container">
    <div class="page-header">
        <h1>Изменение подразделения</h1>
        <p>Перенос сотрудника в другое подразделение</p>
    </div>

    <?php if (isset($message) && $message): ?>
        <div class="alert alert-error">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <div class="form-card">
        <?php if (isset($employee) && $employee): ?>
            <div class="employee-info">
                <div class="employee-card">
                    <div class="employee-avatar">
                        <?= strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) ?>
                    </div>
                    <div class="employee-details">
                        <h3><?= htmlspecialchars($employee->getFullNameAttribute()) ?></h3>
                        <div class="employee-meta">
                            <div class="meta-item">
                                <span class="meta-label">Текущее подразделение:</span>
                                <span class="meta-value"><?= htmlspecialchars($employee->division->division_name ?? 'Не указано') ?></span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Должность:</span>
                                <span class="meta-value"><?= htmlspecialchars($employee->position->position_name ?? 'Не указана') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form method="POST" class="form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-group">
                <label for="division_id">Новое подразделение</label>
                <div class="input-wrapper">
                    <select id="division_id" name="division_id" required>
                        <option value="">Выберите новое подразделение</option>
                        <?php foreach ($divisions as $division): ?>
                            <option value="<?= $division->division_id ?>" <?= ($old['division_id'] ?? '') == $division->division_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($division->division_name) ?>
                                <?php if ($division->employee_count): ?>
                                    (<?= $division->employee_count ?> сотрудников)
                                <?php endif; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-hint">Выберите подразделение для перевода сотрудника</div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Сохранить изменения
                </button>
                <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-outline">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .employee-info {
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--border-light);
    }

    .employee-card {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px;
        background: var(--bg);
        border-radius: 8px;
        border: 1px solid var(--border);
    }

    .employee-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 600;
        color: white;
        flex-shrink: 0;
    }

    .employee-details h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
    }

    .employee-meta {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .meta-item {
        display: flex;
        gap: 8px;
        font-size: 14px;
    }

    .meta-label {
        color: var(--text-light);
        font-weight: 500;
    }

    .meta-value {
        color: var(--text);
        font-weight: 600;
    }

    .form-hint {
        font-size: 12px;
        color: var(--text-light);
        margin-top: 4px;
    }

    @media (max-width: 768px) {
        .employee-card {
            flex-direction: column;
            text-align: center;
            gap: 12px;
        }

        .meta-item {
            flex-direction: column;
            gap: 2px;
            text-align: center;
        }
    }
</style>
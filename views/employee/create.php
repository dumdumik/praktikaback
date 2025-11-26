<div class="form-page">
    <div class="page-header">
        <h1>Добавление сотрудника</h1>
        <p>Заполните информацию о новом сотруднике</p>
    </div>

    <?php if (isset($message) && $message): ?>
        <div class="alert alert-error">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <div class="form-card">
        <form method="POST" class="form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-section">
                <h3>Личная информация</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="last_name">Фамилия</label>
                        <div class="input-wrapper">
                            <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($old['last_name'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Имя</label>
                        <div class="input-wrapper">
                            <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($old['first_name'] ?? '') ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle_name">Отчество</label>
                    <div class="input-wrapper">
                        <input type="text" id="middle_name" name="middle_name" value="<?= htmlspecialchars($old['middle_name'] ?? '') ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birth_date">Дата рождения</label>
                        <div class="input-wrapper">
                            <input type="date" id="birth_date" name="birth_date" value="<?= htmlspecialchars($old['birth_date'] ?? '') ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="registration_address">Адрес регистрации</label>
                    <div class="input-wrapper">
                        <input type="text" id="registration_address" name="registration_address" value="<?= htmlspecialchars($old['registration_address'] ?? '') ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>Рабочая информация</h3>
                <div class="form-group">
                    <label for="division_id">Подразделение</label>
                    <div class="input-wrapper">
                        <select id="division_id" name="division_id" required>
                            <option value="">Выберите подразделение</option>
                            <?php foreach ($divisions as $division): ?>
                                <option value="<?= $division->division_id ?>" <?= ($old['division_id'] ?? '') == $division->division_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($division->division_name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="position_id">Должность</label>
                    <div class="input-wrapper">
                        <select id="position_id" name="position_id" required>
                            <option value="">Выберите должность</option>
                            <?php foreach ($positions as $position): ?>
                                <option value="<?= $position->position_id ?>" <?= ($old['position_id'] ?? '') == $position->position_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($position->position_name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="staff_category_id">Категория персонала</label>
                    <div class="input-wrapper">
                        <select id="staff_category_id" name="staff_category_id" required>
                            <option value="">Выберите категорию</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->staff_category_id ?>" <?= ($old['staff_category_id'] ?? '') == $category->staff_category_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category->staff_category_name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Добавить сотрудника
                </button>
                <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-outline">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-page {
        max-width: 800px;
        margin: 0 auto;
    }

    .page-header {
        margin-bottom: 32px;
    }

    .page-header h1 {
        font-size: 28px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
    }

    .page-header p {
        color: var(--text-light);
        font-size: 16px;
    }

    .form-card {
        background: var(--card-bg);
        padding: 32px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .form-section {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding-bottom: 32px;
        border-bottom: 1px solid var(--border-light);
    }

    .form-section:last-of-type {
        border-bottom: none;
        padding-bottom: 0;
    }

    .form-section h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--primary);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .input-wrapper select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-size: 14px;
        background-color: var(--card-bg);
        cursor: pointer;
    }

    .input-wrapper select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        padding-top: 24px;
        border-top: 1px solid var(--border-light);
    }

    @media (max-width: 768px) {
        .form-card {
            padding: 24px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .form-card {
            padding: 20px;
        }
    }
</style>
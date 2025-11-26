<div class="form-container">
    <div class="form-header">
        <h2>Добавление сотрудника</h2>
        <p>Заполните информацию о новом сотруднике</p>
    </div>

    <?php if (isset($message) && $message): ?>
        <div class="alert alert-error">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="modern-form">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <div class="form-section">
            <h3>Личная информация</h3>
            <div class="form-row">
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" id="last_name" name="last_name" placeholder=" " value="<?= htmlspecialchars($old['last_name'] ?? '') ?>" required>
                        <label for="last_name">Фамилия</label>
                        <span class="input-icon">👤</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" id="first_name" name="first_name" placeholder=" " value="<?= htmlspecialchars($old['first_name'] ?? '') ?>" required>
                        <label for="first_name">Имя</label>
                        <span class="input-icon">👤</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input type="text" id="middle_name" name="middle_name" placeholder=" " value="<?= htmlspecialchars($old['middle_name'] ?? '') ?>">
                    <label for="middle_name">Отчество</label>
                    <span class="input-icon">👤</span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="date" id="birth_date" name="birth_date" value="<?= htmlspecialchars($old['birth_date'] ?? '') ?>" required>
                        <label for="birth_date">Дата рождения</label>
                        <span class="input-icon">📅</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input type="text" id="registration_address" name="registration_address" placeholder=" " value="<?= htmlspecialchars($old['registration_address'] ?? '') ?>" required>
                    <label for="registration_address">Адрес регистрации</label>
                    <span class="input-icon">🏠</span>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h3>Рабочая информация</h3>
            <div class="form-group">
                <div class="input-wrapper select-wrapper">
                    <select id="division_id" name="division_id" required>
                        <option value="">Выберите подразделение</option>
                        <?php foreach ($divisions as $division): ?>
                            <option value="<?= $division->division_id ?>"
                                <?= ($old['division_id'] ?? '') == $division->division_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($division->division_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="division_id">Подразделение</label>
                    <span class="input-icon">🏢</span>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper select-wrapper">
                    <select id="position_id" name="position_id" required>
                        <option value="">Выберите должность</option>
                        <?php foreach ($positions as $position): ?>
                            <option value="<?= $position->position_id ?>"
                                <?= ($old['position_id'] ?? '') == $position->position_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($position->position_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="position_id">Должность</label>
                    <span class="input-icon">💼</span>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper select-wrapper">
                    <select id="staff_category_id" name="staff_category_id" required>
                        <option value="">Выберите категорию</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->staff_category_id ?>"
                                <?= ($old['staff_category_id'] ?? '') == $category->staff_category_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($category->staff_category_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="staff_category_id">Категория персонала</label>
                    <span class="input-icon">👥</span>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <span>➕ Добавить сотрудника</span>
            </button>
            <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-secondary">Отмена</a>
        </div>
    </form>
</div>

<style>
    .form-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .form-header h2 {
        color: #2c3e50;
        font-size: 2.2em;
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
    }

    .alert-error {
        background: #ffeaea;
        color: #e74c3c;
        border: 1px solid #f5b7b1;
    }

    .modern-form {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-section {
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 2px solid #f1f2f6;
    }

    .form-section:last-of-type {
        border-bottom: none;
        margin-bottom: 20px;
    }

    .form-section h3 {
        color: #3498db;
        margin-bottom: 25px;
        font-size: 1.4em;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section h3::before {
        content: '';
        width: 4px;
        height: 20px;
        background: #3498db;
        border-radius: 2px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input,
    .input-wrapper select {
        width: 100%;
        padding: 15px 45px 15px 15px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 1em;
        background: #f8f9fa;
        transition: all 0.3s ease;
        appearance: none;
    }

    .input-wrapper select {
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

    .input-wrapper input:focus,
    .input-wrapper select:focus {
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        outline: none;
    }

    .input-wrapper input:placeholder-shown + label,
    .input-wrapper select:placeholder-shown + label {
        top: 50%;
        transform: translateY(-50%);
        font-size: 1em;
        color: #95a5a6;
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
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2em;
        color: #95a5a6;
        z-index: 2;
    }

    .select-wrapper .input-icon {
        right: 35px;
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
        .form-container {
            padding: 15px;
        }

        .modern-form {
            padding: 30px 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
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
        .modern-form {
            padding: 20px 15px;
        }

        .form-header h2 {
            font-size: 1.8em;
        }
    }
</style>
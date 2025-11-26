<div class="container">
    <div class="form-card">
        <div class="form-header">
            <h2>Добавление нового подразделения</h2>
            <p>Создание нового структурного подразделения компании</p>
        </div>

        <?php if (isset($message) && $message): ?>
            <div class="alert alert-error">
                ❌ <?= $message ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="modern-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-section">
                <h3>Основная информация</h3>

                <div class="form-group">
                    <label for="division_name" class="form-label">
                        Название подразделения *
                    </label>
                    <div class="input-wrapper">
                        <input type="text" id="division_name" name="division_name"
                               value="<?= htmlspecialchars($old['division_name'] ?? '') ?>"
                               placeholder="Введите название подразделения"
                               class="form-input"
                               required>
                        <span class="input-icon">🏢</span>
                    </div>
                    <div class="input-hint">Введите полное название подразделения</div>
                </div>

                <div class="form-group">
                    <label for="division_type_id" class="form-label">
                        Тип подразделения *
                    </label>
                    <div class="input-wrapper select-wrapper">
                        <select id="division_type_id" name="division_type_id"
                                class="form-select"
                                required>
                            <option value="">Выберите тип подразделения</option>
                            <?php foreach ($division_types as $division_type): ?>

                                <option value="<?= $division_type->division_type_id ?>"

                                    <?= ($old['division_type_id'] ?? '') == $division_type->division_type_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($division_type->division_type_name) ?> <!--  --> <!-- division_type_id -->
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <span class="input-icon">📊</span>
                    </div>
                    <div class="input-hint">Выберите тип из существующих</div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <span>🏢 Создать подразделение</span>
                </button>
                <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-secondary">Отмена</a>
            </div>

            <div class="form-footer">
                <small>* Поля, обязательные для заполнения</small>
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

    .modern-form {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .form-section {
        margin-bottom: 20px;
    }

    .form-section h3 {
        color: #3498db;
        margin-bottom: 25px;
        font-size: 1.3em;
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

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 1em;
    }

    .input-wrapper {
        position: relative;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 15px 45px 15px 15px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 1em;
        background: #f8f9fa;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-select {
        appearance: none;
        cursor: pointer;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        outline: none;
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

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2em;
        color: #95a5a6;
    }

    .select-wrapper .input-icon {
        right: 35px;
    }

    .input-hint {
        font-size: 0.85em;
        color: #7f8c8d;
        margin-top: 8px;
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
        font-family: inherit;
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

    .form-footer {
        text-align: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e9ecef;
    }

    .form-footer small {
        color: #7f8c8d;
        font-size: 0.85em;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .form-card {
            padding: 30px 20px;
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
    }
</style>
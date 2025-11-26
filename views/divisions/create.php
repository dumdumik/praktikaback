<div class="form-container">
    <div class="form-header">
        <h1 class="form-title">Добавление подразделения</h1>
        <p class="form-subtitle">Создание нового подразделения в организации</p>
    </div>

    <?php if (isset($message) && $message): ?>
        <div class="alert alert-error">
            <span class="alert-icon">⚠</span>
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="form-wrapper">
        <form method="POST" class="modern-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="input-field">
                <label for="division_name" class="input-label">
                    Название подразделения
                    <span class="required-star">*</span>
                </label>
                <input type="text"
                       id="division_name"
                       name="division_name"
                       class="text-input"
                       placeholder="Введите название подразделения"
                       value="<?= htmlspecialchars($old['division_name'] ?? '') ?>"
                       required>
                <?php if (isset($errors['division_name'])): ?>
                    <div class="error-message"><?= htmlspecialchars($errors['division_name']) ?></div>
                <?php endif; ?>
            </div>

            <div class="input-field">
                <label for="division_type_id" class="input-label">
                    Тип подразделения
                    <span class="required-star">*</span>
                </label>
                <select id="division_type_id" name="division_type_id" class="select-input" required>
                    <option value="">Выберите тип подразделения</option>
                    <?php foreach ($division_types as $type): ?>
                        <option value="<?= $type->division_type_id ?>"
                            <?= ($old['division_type_id'] ?? '') == $type->division_type_id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($type->division_type_name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($errors['division_type_id'])): ?>
                    <div class="error-message"><?= htmlspecialchars($errors['division_type_id']) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <span class="btn-icon">+</span>
                    Создать подразделение
                </button>
                <a href="<?= app()->route->getUrl('/divisions') ?>" class="btn-secondary">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a1a1a;
        margin: 0 0 0.5rem 0;
    }

    .form-subtitle {
        color: #666;
        margin: 0;
        font-size: 0.9rem;
    }

    .form-wrapper {
        width: 100%;
    }

    .input-field {
        margin-bottom: 1.5rem;
    }

    .input-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #333;
        font-size: 0.9rem;
    }

    .required-star {
        color: #e53e3e;
    }

    .text-input,
    .select-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.2s;
        background: #fff;
    }

    .text-input:focus,
    .select-input:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
    }

    .text-input::placeholder {
        color: #a0aec0;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-primary {
        background: #3182ce;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: background 0.2s;
    }

    .btn-primary:hover {
        background: #2c5aa0;
    }

    .btn-secondary {
        background: #fff;
        color: #4a5568;
        border: 2px solid #e2e8f0;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .btn-secondary:hover {
        border-color: #3182ce;
        color: #3182ce;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-error {
        background: #fed7d7;
        color: #c53030;
        border: 1px solid #feb2b2;
    }

    .error-message {
        color: #e53e3e;
        font-size: 0.8rem;
        margin-top: 0.25rem;
    }

    .btn-icon {
        font-weight: bold;
    }
</style>
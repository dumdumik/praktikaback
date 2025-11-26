<div class="admin-container">
    <div class="form-card">
        <h2>Добавить сотрудника отдела кадров</h2>

        <?php if (isset($message) && $message): ?>
            <div class="alert alert-error">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="modern-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-row">
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name" placeholder=" " value="<?= htmlspecialchars($old['name'] ?? '') ?>" required>
                        <label for="name">Имя</label>
                        <span class="input-icon">👤</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" id="lastName" name="lastName" placeholder=" " value="<?= htmlspecialchars($old['lastName'] ?? '') ?>" required>
                        <label for="lastName">Фамилия</label>
                        <span class="input-icon">👥</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input type="text" id="login" name="login" placeholder=" " value="<?= htmlspecialchars($old['login'] ?? '') ?>" required>
                    <label for="login">Логин</label>
                    <span class="input-icon">🔑</span>
                </div>
                <div class="input-hint">Уникальный логин для входа в систему</div>
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder=" " required>
                    <label for="password">Пароль</label>
                    <span class="input-icon">🔒</span>
                </div>
                <div class="input-hint">Минимум 6 символов</div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <span>Создать HR сотрудника</span>
                </button>
                <a href="<?= app()->route->getUrl('/admin/dashboard') ?>" class="btn btn-secondary">Отмена</a>
            </div>
        </form>
    </div>
</div>

<style>
    .admin-container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
    }

    .form-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border: 1px solid #e1e8ed;
    }

    .form-card h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 35px;
        font-size: 2em;
        font-weight: 600;
    }

    .alert {
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 500;
    }

    .alert-error {
        background: #ffeaea;
        color: #e74c3c;
        border: 1px solid #f5b7b1;
    }

    .modern-form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        position: relative;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input {
        width: 100%;
        padding: 15px 45px 15px 15px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 1em;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }

    .input-wrapper input:focus {
        border-color: #3498db;
        background: white;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        outline: none;
    }

    .input-wrapper input:placeholder-shown + label {
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
    }

    .input-hint {
        font-size: 0.8em;
        color: #7f8c8d;
        margin-top: 5px;
        margin-left: 5px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
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
        justify-content: center;
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

    @media (max-width: 768px) {
        .admin-container {
            padding: 15px;
        }

        .form-card {
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
        }
    }
</style>
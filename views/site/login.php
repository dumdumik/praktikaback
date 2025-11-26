<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Вход в систему</h2>
            <p>Введите ваши учетные данные</p>
        </div>

        <?php if (isset($message) && $message): ?>
            <div class="alert alert-error">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form method="post" class="auth-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-group">
                <label for="login">Логин</label>
                <div class="input-wrapper">
                    <input type="text" id="login" name="login" placeholder="Введите ваш логин" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="Введите ваш пароль" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-full">
                Войти в систему
            </button>

            <div class="auth-footer">
                <p>Нет аккаунта? <a href="<?= app()->route->getUrl('/signup') ?>">Зарегистрируйтесь</a></p>
            </div>
        </form>
    </div>
</div>

<style>
    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 20px;
    }

    .auth-card {
        background: var(--card-bg);
        padding: 40px;
        border-radius: 12px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border);
        width: 100%;
        max-width: 400px;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .auth-header h2 {
        color: var(--text);
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .auth-header p {
        color: var(--text-light);
        font-size: 14px;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 14px;
    }

    .alert-error {
        background: #FEF2F2;
        color: #DC2626;
        border: 1px solid #FECACA;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    label {
        font-weight: 500;
        color: var(--text);
        font-size: 14px;
    }

    .input-wrapper input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.2s;
        background-color: var(--card-bg);
    }

    .input-wrapper input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .input-wrapper input::placeholder {
        color: var(--text-lighter);
    }

    .btn {
        padding: 10px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
    }

    .w-full {
        width: 100%;
    }

    .auth-footer {
        text-align: center;
        margin-top: 16px;
    }

    .auth-footer p {
        color: var(--text-light);
        font-size: 14px;
    }

    .auth-footer a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .auth-card {
            padding: 24px;
            margin: 0 16px;
        }
    }
</style>
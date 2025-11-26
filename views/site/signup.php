<div class="auth-container">
    <div class="auth-card">
        <h2>Регистрация нового пользователя</h2>

        <?php if (isset($message) && $message): ?>
            <div class="auth-message error">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form method="post" class="auth-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-row">
                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" name="name" placeholder=" " value="<?= htmlspecialchars($old['name'] ?? '') ?>" required>
                        <label>Имя</label>
                        <span class="input-icon">👤</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <input type="text" name="lastName" placeholder=" " value="<?= htmlspecialchars($old['lastName'] ?? '') ?>" required>
                        <label>Фамилия</label>
                        <span class="input-icon">👥</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input type="text" name="login" placeholder=" " value="<?= htmlspecialchars($old['login'] ?? '') ?>" required>
                    <label>Логин</label>
                    <span class="input-icon">🔑</span>
                </div>
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder=" " required>
                    <label>Пароль</label>
                    <span class="input-icon">🔒</span>
                </div>
            </div>

            <button type="submit" class="auth-button">
                <span>Зарегистрироваться</span>
            </button>

            <div class="auth-links">
                <a href="<?= app()->route->getUrl('/') ?>">Уже есть аккаунт? Войдите</a>
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
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .auth-card h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 2em;
        font-weight: 600;
    }

    .auth-message.error {
        background: #e74c3c;
        color: white;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 25px;
        text-align: center;
        font-size: 0.95em;
        line-height: 1.4;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
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

    .auth-button {
        background: linear-gradient(135deg, #27ae60, #229954);
        color: white;
        border: none;
        padding: 15px;
        border-radius: 12px;
        font-size: 1.1em;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .auth-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3);
    }

    .auth-links {
        text-align: center;
        margin-top: 25px;
    }

    .auth-links a {
        color: #3498db;
        text-decoration: none;
        font-size: 0.95em;
        transition: color 0.3s ease;
    }

    .auth-links a:hover {
        color: #2980b9;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .auth-card {
            padding: 30px 20px;
            margin: 10px;
        }

        .auth-card h2 {
            font-size: 1.6em;
        }
    }

    @media (max-width: 480px) {
        .auth-card {
            padding: 25px 15px;
        }
    }
</style>
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Регистрация</h2>
            <p>Создайте новый аккаунт</p>
        </div>

        <?php if (isset($message) && $message): ?>
            <div class="alert alert-error">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form method="post" class="auth-form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <div class="input-wrapper">
                        <input type="text" id="name" name="name" placeholder="Введите имя" value="<?= htmlspecialchars($old['name'] ?? '') ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastName">Фамилия</label>
                    <div class="input-wrapper">
                        <input type="text" id="lastName" name="lastName" placeholder="Введите фамилию" value="<?= htmlspecialchars($old['lastName'] ?? '') ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="login">Логин</label>
                <div class="input-wrapper">
                    <input type="text" id="login" name="login" placeholder="Введите логин" value="<?= htmlspecialchars($old['login'] ?? '') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-full">
                Зарегистрироваться
            </button>

            <div class="auth-footer">
                <p>Уже есть аккаунт? <a href="<?= app()->route->getUrl('/') ?>">Войдите</a></p>
            </div>
        </form>
    </div>
</div>

<style>
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    @media (max-width: 480px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>
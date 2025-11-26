<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar">
                <?= strtoupper(substr(app()->auth::user()->name, 0, 1) . substr(app()->auth::user()->lastName, 0, 1)) ?>
            </div>
            <h2>Мой профиль</h2>
            <div class="role-badge <?= app()->auth::user()->role ?>">
                <?= app()->auth::user()->role === 'admin' ? 'Администратор' : 'Сотрудник HR' ?>
            </div>
        </div>

        <div class="profile-info">
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <span class="icon">👤</span>
                        Имя
                    </div>
                    <div class="info-value"><?= htmlspecialchars(app()->auth::user()->name) ?></div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <span class="icon">👥</span>
                        Фамилия
                    </div>
                    <div class="info-value"><?= htmlspecialchars(app()->auth::user()->lastName) ?></div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <span class="icon">🔑</span>
                        Логин
                    </div>
                    <div class="info-value"><?= htmlspecialchars(app()->auth::user()->login) ?></div>
                </div>

                <div class="info-item">
                    <div class="info-label">
                        <span class="icon">🎯</span>
                        Роль в системе
                    </div>
                    <div class="info-value role">
                        <?php if (app()->auth::user()->role === 'admin'): ?>
                            <span class="badge admin">Администратор</span>
                        <?php else: ?>
                            <span class="badge hr">Сотрудник HR</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-actions">
            <?php if (app()->auth::user()->role === 'admin'): ?>
                <a href="<?= app()->route->getUrl('/admin/dashboard') ?>" class="action-btn primary">
                    📊 Административная панель
                </a>
            <?php else: ?>
                <a href="<?= app()->route->getUrl('/dashboard') ?>" class="action-btn primary">
                    📊 Дашборд HR
                </a>
            <?php endif; ?>
            <a href="<?= app()->route->getUrl('/logout') ?>" class="action-btn secondary">
                🚪 Выйти из системы
            </a>
        </div>
    </div>
</div>

<style>
    .profile-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 20px;
    }

    .profile-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 500px;
        border: 1px solid #e1e8ed;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .avatar {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #3498db, #2980b9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8em;
        font-weight: bold;
        color: white;
        margin: 0 auto 20px;
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
    }

    .profile-header h2 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 2em;
        font-weight: 600;
    }

    .role-badge {
        display: inline-block;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.9em;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .role-badge.admin {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
    }

    .role-badge.hr {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
    }

    .profile-info {
        margin-bottom: 40px;
    }

    .info-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f1f2f6;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #7f8c8d;
        font-weight: 500;
    }

    .info-label .icon {
        font-size: 1.2em;
    }

    .info-value {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.1em;
    }

    .badge {
        padding: 6px 15px;
        border-radius: 15px;
        font-size: 0.8em;
        font-weight: 600;
        text-transform: uppercase;
    }

    .badge.admin {
        background: #ffeaea;
        color: #e74c3c;
    }

    .badge.hr {
        background: #e1f0fa;
        color: #3498db;
    }

    .profile-actions {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .action-btn {
        padding: 15px 20px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .action-btn.primary {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
    }

    .action-btn.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
    }

    .action-btn.secondary {
        background: #f8f9fa;
        color: #7f8c8d;
        border: 2px solid #e1e8ed;
    }

    .action-btn.secondary:hover {
        background: #e9ecef;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 30px 20px;
            margin: 10px;
        }

        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .profile-header h2 {
            font-size: 1.6em;
        }

        .avatar {
            width: 70px;
            height: 70px;
            font-size: 1.5em;
        }
    }

    @media (max-width: 480px) {
        .profile-card {
            padding: 25px 15px;
        }

        .profile-header h2 {
            font-size: 1.4em;
        }
    }
</style>
<div class="page-container">
    <div class="page-header">
        <h1>Мой профиль</h1>
        <p>Управление вашей учетной записью</p>
    </div>

    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-avatar">
                <?= strtoupper(substr(app()->auth::user()->name, 0, 1) . substr(app()->auth::user()->lastName, 0, 1)) ?>
            </div>
            <div class="profile-info">
                <h2><?= htmlspecialchars(app()->auth::user()->name) ?> <?= htmlspecialchars(app()->auth::user()->lastName) ?></h2>
                <div class="role-badge <?= app()->auth::user()->role ?>">
                    <?= app()->auth::user()->role === 'admin' ? 'Администратор' : 'Сотрудник HR' ?>
                </div>
            </div>
        </div>

        <div class="profile-details">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">
                        <span class="detail-icon">👤</span>
                        Имя
                    </div>
                    <div class="detail-value"><?= htmlspecialchars(app()->auth::user()->name) ?></div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">
                        <span class="detail-icon">👥</span>
                        Фамилия
                    </div>
                    <div class="detail-value"><?= htmlspecialchars(app()->auth::user()->lastName) ?></div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">
                        <span class="detail-icon">🔑</span>
                        Логин
                    </div>
                    <div class="detail-value"><?= htmlspecialchars(app()->auth::user()->login) ?></div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">
                        <span class="detail-icon">🎯</span>
                        Роль в системе
                    </div>
                    <div class="detail-value">
                        <?php if (app()->auth::user()->role === 'admin'): ?>
                            <span class="badge badge-admin">Администратор</span>
                        <?php else: ?>
                            <span class="badge badge-hr">Сотрудник HR</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-actions">
            <?php if (app()->auth::user()->role === 'admin'): ?>
                <a href="<?= app()->route->getUrl('/admin/dashboard') ?>" class="btn btn-primary">
                    📊 Административная панель
                </a>
            <?php else: ?>
                <a href="<?= app()->route->getUrl('/dashboard') ?>" class="btn btn-primary">
                    📊 Дашборд HR
                </a>
            <?php endif; ?>
            <a href="<?= app()->route->getUrl('/logout') ?>" class="btn btn-outline">
                🚪 Выйти из системы
            </a>
        </div>
    </div>
</div>

<style>
    .profile-card {
        background: var(--card-bg);
        padding: 32px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        max-width: 600px;
        margin: 0 auto;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--border-light);
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 600;
        color: white;
        flex-shrink: 0;
    }

    .profile-info h2 {
        font-size: 24px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
    }

    .role-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .role-badge.admin {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
    }

    .role-badge.hr {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
    }

    .profile-details {
        margin-bottom: 32px;
    }

    .detail-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 0;
        border-bottom: 1px solid var(--border-light);
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-label {
        display: flex;
        align-items: center;
        gap: 12px;
        color: var(--text-light);
        font-weight: 500;
        font-size: 14px;
    }

    .detail-icon {
        font-size: 16px;
    }

    .detail-value {
        color: var(--text);
        font-weight: 600;
        font-size: 14px;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .badge-admin {
        background: #FEE2E2;
        color: #DC2626;
    }

    .badge-hr {
        background: #EFF6FF;
        color: var(--primary);
    }

    .profile-actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        padding-top: 24px;
        border-top: 1px solid var(--border-light);
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 24px;
        }

        .profile-header {
            flex-direction: column;
            text-align: center;
            gap: 16px;
        }

        .detail-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .profile-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .profile-card {
            padding: 20px;
        }

        .profile-avatar {
            width: 60px;
            height: 60px;
            font-size: 18px;
        }

        .profile-info h2 {
            font-size: 20px;
        }
    }
</style>
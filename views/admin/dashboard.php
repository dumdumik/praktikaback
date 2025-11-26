<div class="page-container">
    <div class="page-header">
        <h1>Административная панель</h1>
        <p>Управление пользователями системы</p>
    </div>

    <div class="admin-content">
        <div class="section">
            <div class="section-header">
                <h2>Пользователи системы</h2>
                <a href="<?= app()->route->getUrl('/admin/create_hr') ?>" class="btn btn-primary">
                    Добавить HR сотрудника
                </a>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Логин</th>
                        <th>Роль</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="text-muted">#<?= $user->id ?></td>
                            <td><?= htmlspecialchars($user->name) ?></td>
                            <td><?= htmlspecialchars($user->lastName) ?></td>
                            <td><?= htmlspecialchars($user->login) ?></td>
                            <td>
                                <span class="badge badge-<?= $user->role === 'admin' ? 'danger' : 'primary' ?>">
                                    <?= $user->role === 'admin' ? 'Администратор' : 'HR сотрудник' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .admin-content {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .section {
        padding: 32px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .section-header h2 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text);
        margin: 0;
    }

    .text-muted {
        color: var(--text-light);
        font-family: 'Courier New', monospace;
    }

    .badge-danger {
        background: #FEE2E2;
        color: #DC2626;
    }

    .badge-primary {
        background: #EFF6FF;
        color: var(--primary);
    }

    @media (max-width: 768px) {
        .section {
            padding: 24px;
        }

        .section-header {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
        }

        .table {
            font-size: 13px;
        }
    }
</style>
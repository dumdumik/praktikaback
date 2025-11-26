<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Management System</title>
    <style>
        :root {
            --primary: #2563EB;
            --primary-light: #3B82F6;
            --primary-dark: #1D4ED8;
            --bg: #F8FAFC;
            --card-bg: #FFFFFF;
            --text: #1E293B;
            --text-light: #64748B;
            --text-lighter: #94A3B8;
            --border: #E2E8F0;
            --border-light: #F1F5F9;
            --success: #10B981;
            --success-light: #34D399;
            --danger: #EF4444;
            --warning: #F59E0B;
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.5;
            font-size: 14px;
        }

        header {
            background-color: var(--card-bg);
            box-shadow: var(--shadow);
            padding: 0;
            border-bottom: 1px solid var(--border);
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
            height: 64px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 20px;
            font-weight: 600;
            color: var(--text);
        }

        .nav-links {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        header a {
            text-decoration: none;
            color: var(--text-light);
            font-weight: 500;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.2s;
        }

        header a:hover {
            color: var(--primary);
            background-color: #F8FAFC;
        }

        header a.active {
            color: var(--primary);
            background-color: #EFF6FF;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-light);
            font-size: 14px;
        }

        main {
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
            min-height: calc(100vh - 64px);
        }

        @media (max-width: 768px) {
            header nav {
                padding: 0 16px;
                flex-direction: column;
                height: auto;
                padding: 16px;
                gap: 16px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            main {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
<header>
    <nav>
        <div class="logo">HR System</div>
        <div class="nav-links">
            <?php if(app()->auth::check()): ?>
                <?php if(app()->auth::user()->role === 'admin'): ?>
                    <a href="<?= app()->route->getUrl('/admin/dashboard') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin') !== false ? 'active' : '' ?>">Админ панель</a>
                    <a href="<?= app()->route->getUrl('/admin/create_hr') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/create_hr') !== false ? 'active' : '' ?>">Добавить HR</a>
                <?php elseif(app()->auth::user()->role === 'hr'): ?>
                    <a href="<?= app()->route->getUrl('/dashboard') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/dashboard') !== false ? 'active' : '' ?>">Дашборд</a>
                    <a href="<?= app()->route->getUrl('/employees/create') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/employees/create') !== false ? 'active' : '' ?>">Добавить сотрудника</a>
                    <a href="<?= app()->route->getUrl('/divisions/create') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/divisions/create') !== false ? 'active' : '' ?>">Добавить подразделение</a>
                    <a href="<?= app()->route->getUrl('/employee/by_category') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/by_category') !== false ? 'active' : '' ?>">Сотрудники по составу</a>
                <?php endif; ?>

                <a href="<?= app()->route->getUrl('/profile') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/profile') !== false ? 'active' : '' ?>">Профиль</a>
                <div class="user-info">
                    <span><?= htmlspecialchars(app()->auth::user()->name) ?></span>
                    <a href="<?= app()->route->getUrl('/logout') ?>" class="btn-outline">Выход</a>
                </div>
            <?php else: ?>
                <a href="<?= app()->route->getUrl('/') ?>" class="<?= $_SERVER['REQUEST_URI'] === '/' ? 'active' : '' ?>">Вход</a>
                <a href="<?= app()->route->getUrl('/signup') ?>" class="<?= strpos($_SERVER['REQUEST_URI'], '/signup') !== false ? 'active' : '' ?>">Регистрация</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/assets/css/styles.css" rel="stylesheet">
    <title>HR Management System</title>
</head>
<body>
<header>
    <nav>
        <?php if(app()->auth::check()): ?>
            <?php if(app()->auth::user()->role === 'admin'): ?>
                <a href="<?= app()->route->getUrl('/admin/dashboard') ?>">Админ панель</a>
                <a href="<?= app()->route->getUrl('/admin/create_hr') ?>">Добавить HR</a>
            <?php elseif(app()->auth::user()->role === 'hr'): ?>
                <a href="<?= app()->route->getUrl('/dashboard') ?>">Дашборд</a>
                <a href="<?= app()->route->getUrl('/employees/create') ?>">Добавить сотрудника</a>
                <a href="<?= app()->route->getUrl('/divisions/create') ?>">Добавить подразделение</a>
                <a href="<?= app()->route->getUrl('/employee/by_category') ?>">Сотрудники по составу</a>
            <?php endif; ?>

            <a href="<?= app()->route->getUrl('/profile') ?>">Профиль</a>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= htmlspecialchars(app()->auth::user()->name) ?>)</a>
        <?php else: ?>
            <a href="<?= app()->route->getUrl('/') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php endif; ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }

    header{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    header>nav{
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        padding: 0 20px;
    }

    header>nav>a{
        text-decoration: none;
        color: #2c3e50;
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 25px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    header>nav>a:hover {
        background: #3498db;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
    }

    header>nav>a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    header>nav>a:hover::before {
        left: 100%;
    }

    main{
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
        min-height: calc(100vh - 70px);
        padding: 40px 20px;
    }
</style>
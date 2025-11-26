<div class="form-page">
    <div class="page-header">
        <h1>Добавление подразделения</h1>
        <p>Создание нового подразделения в организации</p>
    </div>

    <?php if (isset($message) && $message): ?>
        <div class="alert alert-<?= isset($message_type) ? $message_type : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="form-card">
        <form method="POST" class="form">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

            <div class="form-group">
                <label for="division_name" class="required">Название подразделения</label>
                <div class="input-wrapper">
                    <input type="text" id="division_name" name="division_name"
                           placeholder="Введите название подразделения"
                           value="<?= htmlspecialchars($old['division_name'] ?? '') ?>"
                           required
                           maxlength="255">
                    <?php if (isset($errors['division_name'])): ?>
                        <div class="form-error"><?= htmlspecialchars($errors['division_name']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="division_type_id" class="required">Тип подразделения</label>
                <div class="input-wrapper">
                    <select id="division_type_id" name="division_type_id" required>
                        <option value="">Выберите тип подразделения</option>
                        <?php foreach ($division_types as $type): ?>
                            <option value="<?= $type->division_type_id ?>"
                                <?= ($old['division_type_id'] ?? '') == $type->division_type_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($type->division_type_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['division_type_id'])): ?>
                        <div class="form-error"><?= htmlspecialchars($errors['division_type_id']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="parent_division_id">Родительское подразделение</label>
                <div class="input-wrapper">
                    <select id="parent_division_id" name="parent_division_id">
                        <option value="">Без родительского подразделения</option>
                        <?php foreach ($parent_divisions as $division): ?>
                            <option value="<?= $division->division_id ?>"
                                <?= ($old['parent_division_id'] ?? '') == $division->division_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($division->division_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['parent_division_id'])): ?>
                        <div class="form-error"><?= htmlspecialchars($errors['parent_division_id']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <div class="input-wrapper">
                    <textarea id="description" name="description"
                              placeholder="Введите описание подразделения (необязательно)"
                              rows="3"
                              maxlength="500"><?= htmlspecialchars($old['description'] ?? '') ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <div class="form-error"><?= htmlspecialchars($errors['description']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <span class="btn-icon">+</span>
                    Создать подразделение
                </button>
                <a href="<?= app()->route->getUrl('/divisions') ?>" class="btn btn-outline">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>
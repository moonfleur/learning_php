<div class="container">
    <?php if(isset($message)) : ?>
        <div class="alert alert-success" role="alert">
            <?=$message?>
        </div>
    <?php endif; ?>
    <div class="row">
        <form action="/users/updateUser.php" method="post">
            <input type="hidden" value="<?= $user_data['id'] ?>" name="user_id">
            <div class="form-group">
                <label for="login">Логін</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Логін" value="<?= $user_data['user_name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user_data['email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Змінити пароль">
            </div>
            <div class="form-group">
                <label for="role">Роль</label>
                <select class="form-control" id="role" name="role">
                    <option value="0" <?php if($user_data['role'] == 0) {echo "selected";} ?> disabled>Виберіть...</option>
                    <option value="1" <?php if($user_data['role'] == 1) {echo "selected";} ?> >Адміністратор</option>
                    <option value="2" <?php if($user_data['role'] == 2) {echo "selected";} ?> >Модератор</option>
                    <option value="3" <?php if($user_data['role'] == 3) {echo "selected";} ?> >Хтось лєвий</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>
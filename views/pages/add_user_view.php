<div class="container">
    <?php if(isset($message)) : ?>
        <div class="alert alert-success" role="alert">
            <?=$message?>
        </div>
    <?php endif; ?>
    <div class="row">
        <form action="/saveUser.php" method="post">
            <div class="form-group">
                <label for="login">Логін</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Логін">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
            </div>
            <div class="form-group">
                <label for="role">Роль</label>
                <select class="form-control" id="role" name="role">
                    <option value="0">Виберіть...</option>
                    <option value="1">Адміністратор</option>
                    <option value="2">Модератор</option>
                    <option value="3">Хтось лєвий</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
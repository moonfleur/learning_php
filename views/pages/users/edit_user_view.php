<div class="container">
    <form class="form-horizontal" role="form" action="/users/updateUser.php" method="post">
        <input type="hidden" value="<?= $user_data['id'] ?>" name="user_id">

        <div class="row">
            <div class="col-md-1 field-label-responsive">
                <label for="login">Логін</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="login" class="form-control" id="login" placeholder="John Doe" required autofocus value="<?= $user_data['user_name'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(empty($errors) || !isset($errors['login_field'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if(!empty($errors) || isset($errors['login_field'])) echo $errors['login_field']; ?>
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1 field-label-responsive">
                <label for="email">E-Mail</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required value="<?= $user_data['email'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(empty($errors) || !isset($errors['email_field'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if(!empty($errors) || isset($errors['email_field'])) echo $errors['email_field']; ?>
                        </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1 field-label-responsive">
                <label for="password">Пароль</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1 field-label-responsive">
                <label for="password">Роль</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <select class="form-control" id="role" name="role" <? if($_SESSION['this_user']['role'] != 1) echo 'disabled'; ?>>
                            <option value="0" <?php if($user_data['role'] == 0) {echo "selected";} ?> disabled>Виберіть...</option>
                            <option value="1" <?php if($user_data['role'] == 1) {echo "selected";} ?> >Адміністратор</option>
                            <option value="2" <?php if($user_data['role'] == 2) {echo "selected";} ?> >Модератор</option>
                            <option value="3" <?php if($user_data['role'] == 3) {echo "selected";} ?> >Хтось лєвий</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(empty($errors) || !isset($errors['role_field'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if(!empty($errors) || isset($errors['role_field'])) echo $errors['role_field']; ?>
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </div>
    </form>
</div>
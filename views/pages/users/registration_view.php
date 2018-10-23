<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="/users/registration.php">
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="login">Логін</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="login" class="form-control" id="login" placeholder="John Doe" required autofocus value="<?php if(isset($old_values['login'])) echo $old_values['login']; ?>">
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
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required value="<?php if(isset($old_values['email'])) echo $old_values['email']; ?>">
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
            <div class="col-md-3 field-label-responsive">
                <label for="password">Пароль</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(empty($errors) || !isset($errors['password_field'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if(!empty($errors) || isset($errors['password_field'])) echo $errors['password_field']; ?>
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password_confirm">Повторіть пароль</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Password" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3 <?php if(empty($errors) || !isset($errors['password_confirm'])) echo "d-none"; ?>">
                <div class="form-control-feedback">
                    <span class="text-danger align-middle">
                        <?php if(!empty($errors) || isset($errors['password_confirm'])) echo $errors['password_confirm']; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Зареєструватися</button>
            </div>
        </div>
    </form>
</div>
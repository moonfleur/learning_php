<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="/users/login.php">
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Ввійти</button>
            </div>
        </div>
    </form>
</div>
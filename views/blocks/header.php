<div class="container mb-3">
    <h1 class="text-center"><?php echo $title; ?></h1>
    <div class="row mb-1 d-flex justify-content-between">
        <div class="col-6">
            <a href="/" class="btn btn-primary mr-1">Головна</a>
            <?php if(isset($_SESSION['this_user']) && $_SESSION['this_user']['role'] == 1) : ?>
                <a href="/users" class="btn btn-primary mr-1">Користувачі</a>
                <a href="/users/addUser.php" class="btn btn-primary mr-1">Додати нового користувача</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['this_user']) && ($_SESSION['this_user']['role'] == 1 || $_SESSION['this_user']['role'] == 2)) :?>
                <a href="/articles/addArticle.php" class="btn btn-primary mr-1">Додати нову статтю</a>
            <?php endif; ?>
        </div>
        <div class="col-3 text-right">
            <?php if(isset($_SESSION['this_user'])) : ?>
                <a href="/users/editUser.php?id=<?= $_SESSION['this_user']['id']; ?>" class="btn btn-warning mr-1"><?= $_SESSION['this_user']['email']; ?></a>
                <a href="/users/logout.php" class="btn btn-danger mr-1">Вихід</a>
            <?php else : ?>
                <a href="/users/login.php" class="btn btn-success mr-1">Вхід</a>
                <a href="/users/registration.php" class="btn btn-warning mr-1">Реєстрація</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if(isset($messages) && !empty($messages)) : ?>
    <div class="container">
        <div class="row">
            <?php foreach ($messages as $message) : ?>
                <div class="w-100 alert <?php if ($message['status'] == 'success') echo 'alert-success'; else echo 'alert-danger'; ?>" role="alert">
                    <?= $message['text'] ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
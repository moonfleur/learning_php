<?php if(isset($message)) : ?>
    <div class="alert alert-success" role="alert">
        <?=$message?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Login</th>
                <th scope="col">E-mail</th>
                <th scope="col">Created date</th>
                <th scope="col">Редагувати</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < count($users); $i++) : ?>
                <tr>
                    <th><?= $users[$i]['id'] ?></th>
                    <th><?= $users[$i]['user_name'] ?></th>
                    <th><?= $users[$i]['email'] ?></th>
                    <th><?= $users[$i]['created_at'] ?></th>
                    <th><a href="/editUser.php?id=<?= $users[$i]['id'] ?>" class="btn btn-warning btn-sm">Редагувати</a></th>
                </tr>

            <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>




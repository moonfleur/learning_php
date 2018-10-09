<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <h1 class="text-center">Users</h1>


    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Login</th>
            <th scope="col">E-mail</th>
            <th scope="col">Created date</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($users); $i++) : ?>
            <tr>
                <th><?= $users[$i]['id'] ?></th>
                <th><?= $users[$i]['user_name'] ?></th>
                <th><?= $users[$i]['email'] ?></th>
                <th><?= $users[$i]['created_at'] ?></th>
            </tr>

        <?php endfor; ?>
        </tbody>
    </table>

</body>
</html>
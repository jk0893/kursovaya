<?php
require('../../views/layout/header.php');
?>

    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../styles/style.css">
        <title>Обслуживание компьютерной техники</title>
    </head>
    <body>
    <form action="login.php" class="container">
        <div class="login">
            <div class="mb-4">
                <label class="form-label" style="color:whitesmoke">
                    <input type="email" class="form-control" id="email/login" aria-describedby="emailHelp"
                           placeholder="Логин">
                </label>
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1" style="color:whitesmoke" class="form-label">
                    <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                           placeholder="Логин">
                </label>
            </div>
            <button type="submit" class="btn btn-outline-info" style="color:whitesmoke; background-color:#76acd9">
                Отправить
            </button>
        </div>
    </form>
    </body>
    </html>
<?php
require('../../views/layout/footer.php');
?>
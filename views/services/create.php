<?php
require('../layout/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
?>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/style.css">
    <div class="container text-light">
        <form action=""
              method="post"
              class="d-flex flex-column justify-content-center align-items-center">
            <div class="position-absolute top-50 end-50 d-flex flex-column justify-content-center align-items-center">
                <h3>Добавление</h3>
                <div>
                    <div class="mb-2">
                        <label class="form-label text-light">Название услуги:</label>
                        <input type="text" name="name" class="form-control" id="first_name"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label class="form-label text-light">Тип услуги:</label>
                        <input type="text" name="type" class="form-control" id="last_name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label class="form-label text-light">Цена:</label>
                        <input type="number" name="price" class="form-control" id="father_name"
                               aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-outline-light">Отправить</button>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['name'])) {
            require($_SERVER['DOCUMENT_ROOT'] . '/controllers/Services.php');
            $db = new Services();
            $data = $db->createService(json_encode([
                'name' => $_POST['name'],
                'type' => $_POST['type'],
                'price' => $_POST['price']
            ]));
            $message = json_decode($data)->message;
            echo $message;
        }
        ?>
    </div>
<?php
?>
<?php
require ('../layout/header.php');
require ($_SERVER['DOCUMENT_ROOT'].'/controllers/Roles.php');
?>
<div class="container mt-5">
    <form action="../../middleware/warehouse/createWarehouse.php"
          method="post"
          class="d-flex flex-column justify-content-center align-items-center">
        <h3>Добавление</h3>
        <div class="col-5">
            <label for="name">Название</label>
            <input id="name" name="name" type="text" class="form-control" required>
        </div>
        <div class="col-5">
            <label for="quantity">Количество</label>
            <input id="quantity" name="quantity" type="number" class="form-control" required>
        </div>
        <div class="col-5">
            <label for="price">Стоимость</label>
            <input id="price" name="price" type="number" class="form-control" required>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Отправить</button>
        </div>
    </form>
</div>
<?php
require ('../layout/footer.php');
?>

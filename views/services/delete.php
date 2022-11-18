<?php
require_once ('../layout/header.php');
require_once ('../../controllers/Services.php');
?>
<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
<link rel="stylesheet" href="/styles/style.css">
<div class="container mx-auto text-light">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        $user = new Services();
        $data = $user->getService();
        foreach ($data as $key =>$row){
            ?>
        <div class="card m-4 shadow" id="cards">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name'];?></h5>
                <div>
                    <span class="card-subtitle">Тип: </span>
                    <span class="card-text"><?php echo $row['type'];?></span>
                </div>
                <div>
                    <span class="card-subtitle">Стоимость: </span>
                    <span class="card-text"><?php echo $row['price'];?></span>
                </div>
                <div class="my-2">
                    <form action="../../middleware/service/deleteService.php" method="post">
                        <label>
                            <input name="id" value="<?php echo $row['id'];?>" type="text" hidden>
                            <button class="btn btn-info text-white" type="submit">Удалить</button>
                        </label>
                    </form>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<?php
?>
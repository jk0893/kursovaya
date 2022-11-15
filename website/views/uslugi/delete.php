<?php
require_once ('../layout/header.php');
require_once ('../../controllers/User.php');
?>

<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
<link rel="stylesheet" href="/styles/style.css">
<div class="container mx-auto text-light">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        $user = new User();
        $data = $user->get();
        foreach ($data as $key =>$row){
            ?>
            <div class="card m-2 shadow">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['user'];?></h5>
                    <div>
                        <span class="card-subtitle text-muted">Роль: </span>
                        <span class="card-text"><?php echo $row['role'];?></span>
                    </div>
                    <div class="my-2">
                        <form action="../../middleware/delete.php" method="post">
                            <label>
                            <input name="id" value="<?php echo $row['id'];?>" type="text" hidden>
                            <button class="btn btn-danger" type="submit">Удалить</button>
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>

<?php
require_once ('../layout/footer.php');
?>

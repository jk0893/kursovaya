<?php
require_once ('../layout/header.php');
require_once ('../../controllers/User.php');
?>

<div class="container mx-auto">
    <div style="display: grid; grid-template-columns: repeat(3,1fr)">
        <?php
        $username = new User();
        $data = $username->getUser();
        foreach ($data as $key =>$row){
            ?>
            <div class="card m-2 shadow" id="cards">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['username'];?></h5>
                    <div>
                        <span class="card-subtitle text-muted">Роль: </span>
                        <span class="card-text"><?php echo $row['role_id'];?></span>
                    </div>
                    <div class="my-2">
                        <form action="../../middleware/delete.php" method="post">
                            <label>
                            <input name="id" value="<?php echo $row['id'];?>" type="text" hidden>
                            <button class="btn btn-info text-white" type="submit">Удалить</button>
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

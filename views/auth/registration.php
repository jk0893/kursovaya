<?php
require('../../views/layout/header.php');
if(isset($_SESSION['user'])){
    header('Location: ../../views/auth/lk.php');
}
?>

<body>
<div id="index" style="transform: translateY(-35px)">
    <div class="card auth" id="index-body-auth">
        <div class="card-body">
            <div style="border-radius: 8px">
                <form action="/middleware/auth/registration.php" method="post" enctype="multipart/form-data">
                    <label class="card-title mt-3"
                           style="color:#a7d4fd; font-size: 28px">Регистрация</label>
                    <div class="mt-3 mb-2">
                        <label class="form-label">
                            <input type="search"
                                   class="form-control"
                                   id="username_auth"
                                   name="username"
                                   aria-describedby="username"
                                   placeholder="Логин"
                                   size="25">
                        </label>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            <input type="search"
                                   class="form-control"
                                   size="25"
                                   id="password_auth"
                                   name="password"
                                   aria-describedby="password"
                                   placeholder="Пароль">
                        </label>
                    </div>
                    <div class="mb-2">
                        <label class="form-label input">
                            <input type="file"
                                   class="form-control"
                                   name="avatar"
                                   aria-describedby="avatar"
                                   placeholder="Загрузить аватарку">
                        </label>
                    </div>
                    <button type="submit"
                            class="mb-1 mt-3 btn"
                            style="color:#a7d4fd; background-color:#5D88AC; border-color: #a7d4fd">
                        Отправить
                    </button>
                </form>
            </div>
            <div style="transform: translate(-12.5px, 8px);">
                <ul>
                    <li>Есть аккаунт? - <a style="text-decoration: none; color: #a7d4fd" href="/views/auth/auth.php">Авторизуйся!</a></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
    </div>
</div>
</body>

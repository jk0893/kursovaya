<?php
session_start();

if(!$_SESSION['user']){
    header('Location: ../../views/auth/auth.php');
}
?>
<body>

</body>

<html>
    <head>
        <link href='style1.css' rel='stylesheet' type='text/css'>
        <script type='text/javascript' src='public/js/jquery-3.6.1.min.js'></script>
        <script type='text/javascript'>
            $( document ).ready(function() {
                $("#ax1").click(function() {
                    if($("#me1").css("display") == 'none') {
                        $("#me1").slideDown(500);
                        $("#me2").slideUp(500);
                    }
                    else $("#me1").slideUp(500);
                });
                $("#ax2").click(function() {
                    if($("#me2").css("display") == 'none'){
                        $("#me2").slideDown(500);
                        $("#me1").slideUp(500);
                    }
                    else $("#me2").slideUp(500);
                });
            });
        </script>
    <body>

    <center>

    <div class='topl'>
        <div class='wrap'>
            <a href='#' id='ax1'>Главная</a>
            <div class='menux' id='me1'>
                <a href='#'>Меню1</a>
                <a href='#'>Меню2</a>
                <a href='#'>Меню3</a>
                <a href='#'>Меню4</a>
                <a href='#'>Меню5</a>
        </div>

        <a href='#' id='ax2'>Новости</a>
        <div class='menux' id='me2'>
        <a href='#'>Меню1</a>
            <a href='#'>Меню2</a>
            <a href='#'>Меню3</a>
            <a href='#'>Меню4</a>
            <a href='#'>Меню5</a>
        </div>

        <a href='#'>Контакты</a>

        </div>
    </div>
</center>
</body>
</html>

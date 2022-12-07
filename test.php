<div class="password">
    <input type="password" id="password-input" placeholder="Введите пароль" name="password" value="123456">
    <a href="#" class="password-control"></a>
</div>
<style type="text/css">
    .password {
        width: 300px;
        margin: 15px auto;
        position: relative;
    }
    #password-input {
        width: 100%;
        padding: 5px 0;
        height: 30px;
        line-height: 40px;
        text-indent: 10px;
        margin: 0 0 15px 0;
        border-radius: 5px;
        border: 1px solid #999;
        font-size: 18px;
    }
    .password-control {
        position: absolute;
        top: 11px;
        right: 6px;
        display: inline-block;
        width: 20px;
        height: 20px;
        background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
    }
    .password-control.view {
        background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
    }
</style>

<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('body').on('click', '.password-control', function(){
        if ($('#password-input').attr('type') == 'password'){
            $(this).addClass('view');
            $('#password-input').attr('type', 'text');
        } else {
            $(this).removeClass('view');
            $('#password-input').attr('type', 'password');
        }
        return false;
    });
</script>
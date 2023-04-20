<div class="login-panel">
    <div class="login-main-block">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="nickname">Логин или email:</label>
            <br>
            <input id="nickname" name="nickname">

            <label for="password">Пароль:</label>
            <br>
            <input id="password" name="password">
            <button>Войти</button>
        </form>
    </div>
    <div class="login-footer-block">
        <a href="">Зарегистрироваться</a>
        <a href="">Забыл пароль?</a>
    </div>
</div>

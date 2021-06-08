<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="ajax.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section">
    <form action="post.php" method="POST" id="form">
        <h2>Регистрация</h2>
        <div class="form-row">
            <label for="user_login">Логин:</label>
            <input id="user_login" name="user_login" type="text" placeholder="Login"/>
        </div>
        <div class="form-row">
            <label for="user_password">Пароль:</label>
            <input id="user_password" name="user_password" type="text" placeholder="Password"/>
        </div>
        <div class="form-row">
            <label for="user_email">Email:</label>
            <input id="user_email" name="user_email" type="text" placeholder="Email"/>
        </div>
        <div class="form-row-submit">
            <input type="submit" id="submit" value="Отправить"/>
        </div>
    </form>
    <div id="result"></div>
</div>
</body>
</html>

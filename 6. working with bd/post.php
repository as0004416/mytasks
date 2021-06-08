<?php
header('Content-Type: text/html; charset=utf-8');
$servername = 'localhost';
$username = 'root';
$password = 'admin';
$dbname = 'users';
$errors = [];
$mysqli = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['user_login']) && isset($_POST['user_password']) && isset($_POST['user_email'])) {
    $user_login = $_POST['user_login'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }
    if ($_POST['user_login'] == '') {
        $errors[] = 'Не заполнено поле Логин';
    }
    if ($_POST['user_password'] == '') {
        $errors[] = 'Не заполнено поле Пароль';
    }
    if ($_POST['user_email'] == '') {
        $errors[] = 'Не заполнено поле Email';
    }
    $query_login = mysqli_query($mysqli, "SELECT user_id FROM user WHERE user_login='" . $mysqli->real_escape_string($_POST['user_login']) . "'");
    $query_email = mysqli_query($mysqli, "SELECT user_id FROM user WHERE user_email='" . $mysqli->real_escape_string($_POST['user_email']) . "'");
    if (mysqli_num_rows($query_login) > 0 && mysqli_num_rows($query_email) > 0) {
        $errors[] = "Пользователь с таким логином и email уже существует в базе данных";
    } elseif (mysqli_num_rows($query_login) > 0) {
        $errors[] = "Пользователь с таким логином уже существует в базе данных";
    } elseif (mysqli_num_rows($query_email) > 0) {
        $errors[] = "Пользователь с таким email уже существует в базе данных";
    }
    if (!empty($_POST['user_password']) && strlen($_POST['user_password']) <= 6) {
        $errors[] = "Пароль должен быть не меньше 6 символов";
    }elseif (!empty($_POST['user_password']) && !preg_match("/^[a-zA-Z0-9]+$/", $_POST['user_password'])){
        $errors[] = "Пароль может состоять только из букв английского алфавита и цифр";
    }
    if (!empty($_POST['user_login']) && !preg_match("/^[a-zA-Z0-9]+$/", $_POST['user_login'])) {
        $errors[] = "Логин может состоять только из букв английского алфавита и цифр";
    } elseif (!empty($_POST['user_login']) && strlen($_POST['user_login']) <= 3 or strlen($_POST['user_login']) > 20) {
        $errors[] = "Логин должен быть не меньше 3 символов и не больше 20";
    }
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL) !== false && !empty($user_email)) {
        $errors[] = "Email введен не корректно!";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO user (user_login, user_password, user_email) 
VALUES ('$user_login','$user_password','$user_email')";
        if (mysqli_query($mysqli, $sql)) {
            echo '<div class="added_succuss">Новая запись добавлена успешно!</div>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    } else {
        foreach ($errors as $value) {
            echo "<div class='errors'>" . $value . "</div>";
        }
    }
    mysqli_close($mysqli);
}
?>
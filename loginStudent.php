<?php
session_start();
try {
    $conn = new PDO("mysql:host=localhost; dbname=students", 'root', '');

    if (empty($_POST['login'])) exit("Не вказано логін!");
    if (empty($_POST['password'])) exit("Не вказано пароль!");

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM system_info WHERE login='$login' AND password='$password'";
    $user = $conn->query($query);
    $count = $user->rowCount();
    if($count == 1)
    {
        $_SESSION['login']=$login;
        echo "Автентифікація минула успішно!";
    }
    else
    {
        echo "Помилка! Логін або пароль введено неправильно!";
    }

    if (isset($_SESSION['login']) && $count == 1)
    {
        echo " Для переходу на сайт скористайтеся ";
        echo "<a href='uzhnugram.html' class='btn btn-lg btn-primary'>цим посиланням.</a>";
    }

}
catch (PDOException $e) {
    echo "error".$e->getMessage();
}
?>

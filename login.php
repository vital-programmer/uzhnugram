<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>Uzhnugram</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "styles3.css">
</head>
<body>

<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=students", 'root', '');

    if (isset($_POST['login']) &&
        isset($_POST['password']))

    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = "SELECT * FROM system_info WHERE login='$login' AND password='$password'";
        $user = $conn->query($query);
        $count = $user->rowCount();
        if($count == 1)
        {
            $_SESSION['login']=$login;
            $msg = "Автентифікація минула успішно!";
        }
        else
        {
            $flsmsg = "Помилка! Логін або пароль введено неправильно!";
        }
    }

}
catch (PDOException $e) {
    echo "error".$e->getMessage();
}
?>


<div class="container">
    <form class="form-signin" method="post">
        <h2>Вхід</h2>
        <?php if(isset($msg)){?> <div class="alert alert-success" role="alert"><?php echo $msg ?></div>
            <a href="uzhnugram.html" class="btn btn-lg btn-primary btn-block">Перейти на сайт</a>
        <?php }?>

        <?php if(isset($flsmsg)){?> <div class="alert alert-danger" role="alert"><?php echo $flsmsg ?></div> <?php }?>

        <?php if(!isset($msg)){?>
        <input type="text" name="login" class="form-control" placeholder="Логін" required>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Увійти</button>
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Зареєструватися</a>
        <?php } ?>
    </form>
</div>
</body>
</html>
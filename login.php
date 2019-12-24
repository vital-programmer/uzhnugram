<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>Uzhnugram</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
</head>
<body>
<div class="container">
    <form class="form-signin" action="loginStudent.php" method="post">
        <h2>Вхід</h2>
        <input type="text" name="login" class="form-control" placeholder="Логін" required>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Увійти</button>
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Зареєструватися</a>
    </form>
</div>
</body>
</html>
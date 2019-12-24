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
    <form class="form-signin" action="addStudent.php" method="post">
        <h2>Реєстрація</h2>
        <input type="text" name="login" class="form-control" placeholder="Логін" required>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <select size="1" name="year_of_studying" class="form-control">
            <option>1 курс</option>
            <option>2 курс</option>
            <option>3 курс</option>
            <option>4 курс</option>
            <option>5 курс</option>
        </select>
        <select size="1" class="form-control" name="faculty">
            <option>Факультет інформаційних технологій</option>
            <option>Економічний факультет</option>
        </select>
        <select size="1" class="form-control" name="speciality">
            <option>Інженерія програмного забезпечення</option>
            <option>Комп'ютерні науки</option>
            <option>Інформаційні системи та технології</option>
        </select>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зареєструватися</button>
        <a href="login.php" class="btn btn-lg btn-primary btn-block">Увійти</a>
    </form>
</div>
</body>
</html>
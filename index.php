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
        isset($_POST['password'])  &&
        isset($_POST['year_of_studying'])  &&
        isset($_POST['faculty'])  &&
        isset($_POST['speciality']))
    {

        $login = $_POST['login'];
        $query = "SELECT * FROM system_info WHERE login='$login'";
        $user = $conn->query($query);
        $count = $user->rowCount();
        if($count == 1)
        {
            $flsmsg = "Даний логін уже використовується! Оберіть інший.";
        }

        if ($count == 0)
        {
            $query = "INSERT INTO system_info VALUES (NULL, :login, :password, :year_of_studying, :faculty,
            :speciality)";
            $user = $conn->prepare($query);
            $user->execute(['login' => $_POST['login'], 'password' => $_POST['password'],
                'year_of_studying' => $_POST['year_of_studying'], 'faculty' => $_POST['faculty'],
                'speciality' => $_POST['speciality']]);

            $user_id = $conn->lastInsertId();

            $query = "INSERT INTO info_to_show VALUES (NULL, :name, :surname, :achievements, :about, :instagram,
            :facebook, :image_path, :user_id)";
            $user = $conn->prepare($query);
            $user->execute(['name' => "Ім'я", 'surname' => "Прізвище", 'achievements' => "Досягнення",
                'about' => "Інформація", 'instagram' => "Посилання на Instagram", 'facebook' => "Посилання на Facebook",
                'image_path' => "images\man-student.png",
                'user_id' => $user_id]);
            if ($user) {
                $msg = "Реєстрація минула успішно!";
            }
            else {
                $flsmsg = "Помилка!";
            }
        }
    }
}

catch (PDOException $e)
{
    echo "error".$e->getMessage();
}

?>

<div class="container">
    <form class="form-signin" method="post">
        <h2>Реєстрація</h2>
        <?php if(isset($msg)){?> <div class="alert alert-success" role="alert"><?php echo $msg ?></div> <?php }?>
        <?php if(isset($flsmsg)){?> <div class="alert alert-danger" role="alert"><?php echo $flsmsg ?></div> <?php }?>
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
<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=students", 'root', '');

    if (empty($_POST['login'])) exit("Не вказано ім'я!");
    if (empty($_POST['password'])) exit("Не вказано прізвище!");
    if (empty($_POST['year_of_studying'])) exit("Не вказано місто!");
    if (empty($_POST['faculty'])) exit("Не вказано кількість отриманих балів!");
    if (empty($_POST['speciality'])) exit("Не вказано кількість розв'язаних завдань!");


    $query = "INSERT INTO system_info VALUES (NULL, :login, :password, :year_of_studying, :faculty, :speciality)";
        $user = $conn->prepare($query);
        $user->execute(['login' => $_POST['login'], 'password' => $_POST['password'],
            'year_of_studying' => $_POST['year_of_studying'], 'faculty' => $_POST['faculty'],
            'speciality' => $_POST['speciality']]);

        $user_id = $conn->lastInsertId();

        $query = "INSERT INTO info_to_show VALUES (NULL, :name, :surname, :achievements, :about, :instagram, :facebook,
:user_id)";
        $user = $conn->prepare($query);
        $user->execute(['name' => "Ім'я", 'surname' => "Прізвище", 'achievements' => "Досягнення",
            'about' => "Інформація", 'instagram' => "Посилання на Instagram", 'facebook' => "Посилання на Facebook",
            'user_id' => $user_id]);
        if ($user) {
            $msg = "Реєстрація минула успішно";
        }
        header("Location: login.php");
    }

catch (PDOException $e)
{
    echo "error".$e->getMessage();
}

?>
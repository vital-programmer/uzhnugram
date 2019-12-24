<?
session_start();
try {
    $conn = new PDO("mysql:host=localhost; dbname=students", 'root', '');

    if (empty($_POST['name'])) exit("Не вказано ім'я!");
    if (empty($_POST['surname'])) exit("Не вказано прізвище!");
    if (empty($_POST['achievements'])) exit("Не вказано досягнення!");
    if (empty($_POST['about'])) exit("Не вказано інформацію про особу!");

    $login = $_SESSION['login'];
    $query = "SELECT * FROM system_info WHERE login='$login'";
    $user = $conn->query($query);
    $user_id = 1;
    while($row = $user->fetch())
        $user_id = $row["user_id"];

    $data = [
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'achievements' => $_POST['achievements'],
        'about' => $_POST['about'],
        'instagram' => $_POST['instagram'],
        'facebook' => $_POST['facebook']
    ];
    $query = "UPDATE info_to_show SET name=:name, surname=:surname, achievements=:achievements, about=:about,
instagram=:instagram, facebook=:facebook WHERE user_id = $user_id";
    $user = $conn->prepare($query);
    $user->execute($data);
    echo "Дані успішно оновлено!";
}
catch (PDOException $e)
{
    echo "error".$e->getMessage();
}
?>
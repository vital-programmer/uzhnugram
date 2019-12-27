<?
session_start();
try {
    $conn = new PDO("mysql:host=localhost; dbname=students", 'root', '');

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

    $path = 'images\\';

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_FILES['picture']['name'] == "")
            $image_path = $path. "man-student.png";
        else
            $image_path = $path. $_FILES['picture']['name'];
        $data = [
            'image_path'=>$image_path
        ];
        $query = "UPDATE info_to_show SET image_path=:image_path WHERE user_id = $user_id";
        $user = $conn->prepare($query);
        $user->execute($data);
        if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
            header('Location: editFailed.php');
    }
    header('Location: editSuccess.php');
}
catch (PDOException $e)
{
    echo "error".$e->getMessage();
}
?>
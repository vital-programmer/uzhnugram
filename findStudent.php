<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>Uzhnugram</title>
    <link rel = "stylesheet" type = "text/css"
          href = "styles2.css">
</head>
<body class = "main">
<div class = "header">
    <img id = "uzhnu_logo" src="images\UzhNU_logo.png">
    <img id = "site_logo" src="images\site_logo.png" align="center">
    <a href='logout.php'>Вийти</a>
    <a href="editStudent.php">Редагувати інформацію про себе</a>
</div>
<div class="layout">
    <div class = "col2">
<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=students", 'root', '');
    $year_of_studying = $_POST['year_of_studying'];
    $faculty = $_POST['faculty'];
    $speciality = $_POST['speciality'];

    $sql = "SELECT * FROM info_to_show JOIN system_info ON system_info.user_id = info_to_show.user_id ORDER BY surname";
    $query	 = $conn->query($sql);
    while($row = $query->fetch())
        if ($row["year_of_studying"] == $_POST['year_of_studying'] && $row["faculty"] == $_POST['faculty']
            && $row["speciality"] == $_POST['speciality'])
        echo "<br> Прізвище: ".$row["surname"]."<br> Ім'я: ".$row["name"]."<br> Досягнення: ".$row["achievements"]
            ."<br> Про себе: " .$row["about"]."<br> Сторінка в Instagram: ".$row["instagram"].
            "<br> Сторінка в Facebook: ".$row["facebook"]."<hr>";
}
catch (PDOException $e) {
    echo "error".$e->getMessage();
}
?>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>Uzhnugram</title>
    <link rel = "stylesheet" type = "text/css"
          href = "styles3.css">
</head>
<body class = "main">
<div class = "header">
    <img id = "uzhnu_logo" src="images\UzhNU_logo.png">
    <img id = "site_logo" src="images\site_logo.png" align="center">
    <a id = "logout" href="logout.php">Вийти</a>
    <a id = "edit" href="editStudentForm.php">Редагувати</a>
</div>
<div class="layout">
    <div class = "col1">Кол1</div>
    <div class = "col2">
        <form action="findStudent.php" method="post">
            <select size="1" name="year_of_studying">
                <option>1 курс</option>
                <option>2 курс</option>
                <option>3 курс</option>
                <option>4 курс</option>
                <option>5 курс</option>
            </select>
            <select size="1" name="faculty">
                <option>Факультет інформаційних технологій</option>
                <option>Економічний факультет</option>
            </select>
            <select size="1" name="speciality">
                <option>Інженерія програмного забезпечення</option>
                <option>Комп'ютерні науки</option>
                <option>Інформаційні системи та технології</option>
            </select>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Знайти</button>
        </form>
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
    <div class = "col3">.Кол3</div>
</div>
<div class = "footer">
    <div class="col_1"></div>
    <div class="col_2">
        Некомерційний проект. Продаж будь-яких матеріалів заборонено.
        <ul>
            <li><a href="https://www.youtube.com/watch?v=R82a_NXwbtg">Про розробника</a></li>
            <li><a href="https://www.instagram.com/vitalijhanulych/">Сторінка в Instagram</a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100010431215121">Сторінка у Facebook</a></li>
        </ul>
    </div>
    <div class="col_3"></div>
</div>
</body>
</html>
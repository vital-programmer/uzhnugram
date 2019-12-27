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
<div class = "layout">
    <div class = "col1">Кол1</div>
    <div class = "col2">
        <!--			<div class = "person">
                        <p class = "name">Катерина</p>
                        <img src = "images/woman-student.png" alt = "Фото особи">
                        <div class = "about">Студентка УжНУ</div>
                    </div>
                    <div class = "persons_out"></div> -->
<!--        <form method="post" action="test.php" enctype="multipart/form-data">
            <input type="file" name="picture">
            <input type="submit" value="Загрузить">
        </form> -->
        <form action="editStudent.php" method="post" enctype="multipart/form-data">
            <input type="file" name="picture"><br>
            <input type="text" name="name" placeholder="Ім'я" required><br>
            <input type="text" name="surname" placeholder="Прізвище" required><br>
            <textarea name="achievements" placeholder="Досягнення" required></textarea><br>
            <textarea name="about" placeholder="Про себе" required></textarea><br>
         <!--   <input type="text" name="achievements" placeholder="Досягнення" required><br>
            <input type="text" name="about" placeholder="Про себе" required><br> -->
            <input type="text" name="instagram" placeholder="Instagram" required><br>
            <input type="text" name="facebook" placeholder="Facebook" required><br>
 <!--           <textarea name="achievements"></textarea><br>
            <textarea name="about"></textarea><br>-->
            <input type="submit" value="Зберегти"></input>
        </form>
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
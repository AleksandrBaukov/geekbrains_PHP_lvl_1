<?php include_once "../server/admin_core.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <link rel="stylesheet" href="../public/css/style.css" type="text/css" media="all">
</head>
<body>
<div id="container">
            <div class="menu">
                <a href="index.php" class="buy-btn admin-btn"><span>Главная</span></a>
                <a href="adding.php" class="buy-btn admin-btn"><span>Добавить товар</span></a>
                </div>
    <div class="content">
        <form method="post" enctype="multipart/form-data">
            <p><strong>Добавить товар:</strong></p>
            <p>Введите наименование: <br><input type="text" name="name" maxlength="100" required></p>
            <p>Введите краткое описание: <br><textarea name="smallDesc" rows="10" required></textarea></p>
            <p>Введите подробное описание: <br><textarea name="fullDesc" rows="10" required></textarea></p>
            <p>Введите цену: <br><input type="number" name="price" maxlength="20" required></p>
            <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
</div>
</body>
</html>

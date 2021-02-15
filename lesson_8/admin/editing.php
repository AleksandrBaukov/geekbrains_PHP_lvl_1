<?php include_once "../server/admin_core.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <link rel="stylesheet" href="../public/css/style.css" type="text/css" media="all">
</head>
<body>
<div class="container">
            <div class="menu">
                    <a href="index.php" class="buy-btn admin-btn"><span>Главная</span></a>
                    <a href="adding.php" class="buy-btn admin-btn"><span>Добавить товар</span></a>
                    <a href="orders.php" class="buy-btn admin-btn"><span>Заказы</span></a>
            </div>
    <div class="content">
        <form method="post" enctype="multipart/form-data">
            <p><strong>Добавить товар:</strong></p>
            <p>наименование: <br><input type="text" name="name" maxlength="100" value="<?=$good['name']?>"></p>
            <p>краткое описание: <br><textarea name="smallDesc" rows="10"><?=$good['smallDesc']?></textarea></p>
            <p>подробное описание: <br><textarea name="fullDesc" rows="10"><?=$good['fullDesc']?></textarea></p>
            <p>цена: <br><input type="number" name="price" maxlength="20" value="<?=$good['price']?>" ></p>
            <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
            <p><img src="../public/<?=$good['path']?>" width="200"></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
            <input type="hidden" name="src" value="<?=$good['path']?>">
            <input type="hidden" name="edit" value="<?=$good['id']?>">
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
</div>
</body>
</html>
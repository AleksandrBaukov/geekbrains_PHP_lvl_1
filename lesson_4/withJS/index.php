<?php 
$photos = array_slice(scandir("img-small"), 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>    
        <h1>Галерея фотографий</h1>
        <div class="gallery">
            <?php
            for($i=0;$i<count($photos);$i++):?>    
                <img src="img-small/<?= $photos[$i]?>" alt="photo" class="photo">
                <div class="wrap hidden">
                    <?php echo $i ; //проверял, почему то в этом месте индекс не увеличивается?> 
                    <span>&times;</span>
                    <img src="img-big/<?= $photos[$i];?>">
                </div>
            <?php endfor; ?>
        </div>   
        <script src="js/app.js"></script>
</body>
</html>
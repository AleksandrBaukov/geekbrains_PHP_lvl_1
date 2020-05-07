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
                <a href="img-big/<?= $photos[$i]?>" target="_blank"><img src="img-small/<?= $photos[$i]?>" alt="photo" class="photo"></a>
                
            <?php endfor; ?>
        </div> 
</body>
</html>
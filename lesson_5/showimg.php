<?php
include 'admin/config.php';

$sql = "SELECT * FROM images ORDER BY opened DESC";
$res = mysqli_query($connect, $sql);

if(mysqli_num_rows($res)>0){
    while ($data = mysqli_fetch_assoc($res)){
        $smallImage = $data["path-small"].$data["filename"]; //путь к маленькому фото
        $bigImage = $data["path-big"].$data["filename"]; // путь к большому фото
        $opened = $data["opened"];
        echo '<div class="photo-block">';
        echo '<a href=/showBigimg.php?id='.$data["id"].' target="_blank"><img src="'.$smallImage.'" alt="pic"></a>';
        echo '<div>';
        echo "<svg version=\"1.1\" id=\"Capa_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
                width=\"15px\" height=\"15px\" viewBox=\"0 0 497.25 497.25\" style=\"enable-background:new 0 0 497.25 497.25;\"
                xml:space=\"preserve\">
                <circle cx=\"248.625\" cy=\"248.625\" r=\"19.125\"/>
                <path d=\"M248.625,172.125c-42.075,0-76.5,34.425-76.5,76.5s34.425,76.5,76.5,76.5s76.5-34.425,76.5-76.5
			    S290.7,172.125,248.625,172.125z M248.625,306c-32.513,0-57.375-24.862-57.375-57.375s24.862-57.375,57.375-57.375
			    S306,216.112,306,248.625S281.138,306,248.625,306z\"/>
                <path d=\"M248.625,114.75C76.5,114.75,0,248.625,0,248.625S76.5,382.5,248.625,382.5S497.25,248.625,497.25,248.625
			    S420.75,114.75,248.625,114.75z M248.625,363.375c-153,0-225.675-114.75-225.675-114.75s72.675-114.75,225.675-114.75
			    S474.3,248.625,474.3,248.625S401.625,363.375,248.625,363.375z\"/>
               </svg>";
        echo "<span>$opened</span>";
        echo '</div>';
        echo '</div>';
        }
    }
?>
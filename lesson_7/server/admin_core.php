<?php
include_once "functions.php";

$goods = getAll($connect,'goods');

if(isset($_GET['id'])){
    $id= $_GET['id'];
}
$good = getOne($connect, $id, 'goods');

if($_POST['submit']){
    $name = trim(strip_tags($_POST['name']));
    $smallDesc = trim(strip_tags($_POST['smallDesc']));
    $fullDesc = trim(strip_tags($_POST['fullDesc']));
    $price = (int)trim(strip_tags($_POST['price']));
    function translate($input){
        $assoc = array(
            'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ё'=>'yo', 'ж'=>'j', 'з'=>'z', 'и'=>'i', 'й'=>'i', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'y', 'ф'=>'f', 'х'=>'h', 'ц'=>'c', 'ч'=>'ch', 'ш'=>'sh', 'щ'=>'sh', 'ы'=>'i', 'э'=>'e', 'ю'=>'u', 'я'=>'ya',
            'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ё'=>'Yo', 'Ж'=>'J', 'З'=>'Z', 'И'=>'I', 'Й'=>'I', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'Y', 'Ф'=>'F', 'Х'=>'H', 'Ц'=>'C', 'Ч'=>'Ch', 'Ш'=>'Sh', 'Щ'=>'Sh', 'Ы'=>'I', 'Э'=>'E', 'Ю'=>'U', 'Я'=>'Ya', 'ь'=>'', 'Ь'=>'', 'ъ'=>'', 'Ъ'=>'',
        );
        return $res = strtr($input, $assoc);
    }

    function image_resize(
        $dir,
        $dir_thumbs,
        $newwidth,
        $newheight = FALSE,
        $quality = 100 // качество для формата jpeg
    ) {
        ini_set("gd.jpeg_ignore_warning", 1); // иначе на некотоых jpeg-файлах не работает

        list($oldwidth, $oldheight, $type) = getimagesize($dir);
        switch ($type) {
            case IMAGETYPE_JPEG: $typestr = 'jpeg'; break;
            case IMAGETYPE_GIF: $typestr = 'gif' ;break;
            case IMAGETYPE_PNG: $typestr = 'png'; break;
        }
        $function = "imagecreatefrom$typestr";
        $src_resource = $function($dir);

        if (!$newheight) { $newheight = round($newwidth * $oldheight/$oldwidth); }
        elseif (!$newwidth) { $newwidth = round($newheight * $oldwidth/$oldheight); }
        $destination_resource = imagecreatetruecolor($newwidth,$newheight);

        imagecopyresampled($destination_resource, $src_resource, 0, 0, 0, 0, $newwidth, $newheight, $oldwidth, $oldheight);

        if ($type = 2) { # jpeg
            imageinterlace($destination_resource, 1); // чересстрочное формирование изображение
            imagejpeg($destination_resource, $dir_thumbs, $quality);
        }
        else { # gif, png
            $function = "image$typestr";
            $function($destination_resource, $dir_thumbs);
        }

        imagedestroy($destination_resource);
        imagedestroy($src_resource);
    }

    $filePath  = $_FILES['img']['tmp_name'];
    $fileName  = translate($_FILES['img']['name']);
    $type = $_FILES['img']['type'];
    $size = $_FILES['img']['size'];

    if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
        if($size>0 and $size<10000000){
            if(copy($filePath,"../public/img/".$fileName)){
                image_resize("../public/img/".$fileName, "../public/img/".$fileName, 750, 500);
                if(isset($_POST["edit"])){
                    $id = (int)trim(strip_tags($_POST['edit']));
                    editProduct($connect, $id, $name, $price, "img/".$fileName, $smallDesc, $fullDesc);
                    header("Location: ../admin/index.php");
                }else{
                    newProduct($connect, $name, $price, "img/".$fileName, $smallDesc, $fullDesc);
                    header("Location: ../admin/index.php");
                }

                $message = "<h3>Файл успешно загружен на сервер</h3>";
            }else{
                $message = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                exit;
            }
        }else{
            $message = "<b>Ошибка - картинка превышает 10 Мб.</b>";
        }
    }else{
        $message = "<b>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</b>";
    }
}
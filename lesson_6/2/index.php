<?php include "server.php" ?>
<form action="#" method="get">
    <input type="number" name="firstint" value="<?=$_GET["firstint"];?>">
    <input type="number" name="secondint" value="<?=$_GET["secondint"];?>">
    <span>Ответ = <?=  $answer;?></span>
    <br><br>
    <input type="submit" value="+" name="sign">
    <input type="submit" value="-" name="sign">
    <input type="submit" value="*" name="sign">
    <input type="submit" value="/" name="sign">
</form>

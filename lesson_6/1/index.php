<?php include "server.php" ?>
<form action="#" method="get">
    <input type="number" name="firstint" value="<?=$_GET["firstint"];?>">
    <select name="signs">
        <option value="plus" <?php if ($sign=='plus') echo "selected"?>>+</option>
        <option value="minus" <?php if ($sign=='minus') echo "selected"?>>-</option>
        <option value="mult" <?php if ($sign=='mult') echo "selected"?>>*</option>
        <option value="div" <?php if ($sign=='div') echo "selected"?>>/</option>
    </select>
    <input type="number" name="secondint" value="<?=$_GET["secondint"];?>">
    <input type="submit" value="=">
    <span>Ответ =<?=  $answer?></span>
</form>
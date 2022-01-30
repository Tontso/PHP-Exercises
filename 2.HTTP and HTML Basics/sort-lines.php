<?php

if(isset($_GET['lines'])){
    $towns = array_filter(array_map("trim", explode("\n",$_GET['lines'])));

    sort($towns, SORT_STRING);
    $sortedLines = implode("\n", $towns);
}
?>
<form>
  <textarea rows="10" name="lines"><?= $sortedLines?></textarea> <br>
    <input type="submit" value="Sort">
</form>
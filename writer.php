<html>
<body>
<form id="writer" name="writer" action="phpsorter.php">
<td><input type="submit" name="submit" value="GO BACK" /></td>
</form>
</body>
</html>

<?php
$txt = "pricedatainput.txt";
$fh = fopen($txt, 'a');

if ($_POST["addItemList"] == "notListed") {
  $item = $_POST["addItem"];
} else {
  $item = $_POST["addItemList"];
}

if ($_POST["addStoreList"] == "notListed") {
  $store = $_POST["addStore"];
} else {
  $store = $_POST["addStoreList"];
}

if ($_POST["addMeasureList"] == "notListed") {
  $unit = $_POST["addMeasure"];
} else {
  $unit = $_POST["addMeasureList"];
}

// check if fields are set
if (isset($item) && isset($store) && isset($_POST['addPrice'])
                 && isset($_POST['addWeight']) && isset($unit)){
   $txt=$item.', '.$store.', '.$_POST['addPrice'].', '.$_POST['addWeight'].', '.$unit;
   file_put_contents('pricedatainput.txt',$txt."\n",FILE_APPEND); // log to file
   print_r($txt . " has been added to the database.");
   exit();
}
    fwrite($fh,$txt); // Write information to the file
    fclose($fh); // Close the file

    ?>

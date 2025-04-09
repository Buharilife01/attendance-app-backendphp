<?php
function store($fileDestination)
{
    $fileName = "db.txt";
    $file = fopen($fileName, "a+");
    fwrite($file, $fileDestination . "\n");


    return true;
}
  
?>
<?php
function store($fileDestination)
{
    $fileName = "image.txt";
    $file = fopen($fileName, "a+");
    fwrite($file, $fileDestination . "\n");


    return true;
}
  
?>
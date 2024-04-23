<?php
$fileNames = ["1.txt", "2.txt", "3.txt"];

$newFile = "new.txt";

$mergedContent = "";

foreach ($fileNames as $fileName) {
    if (file_exists($fileName)) { 
        $fileContent = file_get_contents($filePath); 
        $mergedContent .= $fileContent; 
    } else {
        echo "Файл '$fileName' не существует.<br>";
    }
}

file_put_contents($newFile, $mergedContent);
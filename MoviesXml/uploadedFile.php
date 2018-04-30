<?php
const InputKey = 'myfile';
const AllowedTypes = ['text/xml'];
if (empty($_FILES[InputKey])) {
    die("File Missing!");
}

if ($_FILES[InputKey]['error'] > 0) {
    echo $_FILES[InputKey]['error'];
    die("Handle the error!");
}

if (!in_array($_FILES[InputKey]['type'], AllowedTypes)) {
    die("Handle File Type Not Allowed");
}
$tmpFile = $_FILES[InputKey]['tmp_name'];
$dstFile = 'Uploads/' . $_FILES[InputKey]['name'];


if (file_exists($dstFile)) {

    die("This file already exists <a href='index.php'>Upload another files</a><br> ");
}


$moveResult = move_uploaded_file($tmpFile, $dstFile);

if (!$moveResult) {
    die("Erro");
} else {
    echo "Your file has been uploaded! " . "<br>";


    $xml = simplexml_load_file("$dstFile");
    echo $xml->getName() . "<br>";

    foreach ($xml->children() as $movie) {

        echo $movie->getName() . ": " . $movie . "<br>";
    }

    echo "File Name: " . $_FILES["myfile"]["name"] . "<br>";
    echo "File type: " . $_FILES["myfile"]["type"] . "<br>";
    echo "File size: " . ($_FILES["myfile"]["size"] . "<br>");

    if (is_readable($dstFile)) {
        echo " $dstFile is readable" . "<br>";
    }
    if (is_writable($dstFile)) {
        echo " $dstFile is writable" . "<br>";
    }
    echo "<a href='index.php'>Upload more files</a><br>";
}

$fp = fopen($xml, 'r');

while (!feof($fp) && $Line = fgets($fp)) {
    echo explode("\t", $Line)[0];
    echo PHP_EOL;
}
fclose($fp);
?>

<?xml version="1.0" encoding="UTF-8"?>



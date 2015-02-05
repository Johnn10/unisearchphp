<?php
if(isset($_POST['indexseed'])){
$data_to_write = $_POST['indexseed'];
$file_path = "../crawler/indexes.txt";

$file_handle = fopen($file_path, 'w'); 
fwrite($file_handle, $data_to_write);
fclose($file_handle);
}

if(isset($_POST['keywords'])){
$data_to_write = $_POST['keywords'];
$file_path = "../crawler/keywords.txt";

$file_handle = fopen($file_path, 'w'); 
fwrite($file_handle, $data_to_write);
fclose($file_handle);
}
?>
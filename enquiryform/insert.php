<?php 
$data = json_decode(file_get_contents("php://insert"));
$name = mysql_real_escape_string($data->name);
echo 'fdsfsdf';
?>
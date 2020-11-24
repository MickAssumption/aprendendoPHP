<?php
$servername= "localhost";
$username = "root";
$password = "";
$db_name = "crud";

$connect = mysqli_connect($servername, $username, $password, $db_name); //o mysqli tem suporte a procedural e poo.
mysqli_set_charset($connect,"utf-8");

if(mysqli_connect_error()):
    echo "não entrou:" .mysqli_connect_error();
endif;

?>
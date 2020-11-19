<?php
$servername= "localhost";
$username = "root";
$password = "";
$db_name = "sistemalogin";

$connect = mysqli_connect($servername, $username, $password, $db_name); //o mysqli tem suporte a procedural e poo.

if(mysqli_connect_error()):
    echo "não entrou:" .mysqli_connect_error();
endif;
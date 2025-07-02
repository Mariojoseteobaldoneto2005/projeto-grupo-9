<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$DB_SERVER = "database-mariadb-1.ciwsb3bmxptj.us-east-1.rds.amazonaws.com";
$DB_USERNAME = "admin";
$DB_PASSWORD = "HFWHZDBS";
$DB_NAME = "projeto_x";

$conexao = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($conexao->connect_error) {
    header("Location: telaerro.php?error=erro_conexao");
    exit();
}

return $conexao;
?>
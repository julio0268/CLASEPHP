<?php 

/* new = Instanciar = Copia de una clase y darle mis propios valores */

try {

    header("Content-Type: text/html;charset=utf-8");

    $hostDB = 'localhost';
    $nameDB = 'clasephp';

    $host = "mysql:host=$hostDB;dbname=$nameDB";
    $user = 'root';
    $pass = '';

    $conn = new PDO ($host, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'error al conectarse' . $e->getMessage();

}

?>

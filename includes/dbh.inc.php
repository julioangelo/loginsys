<?php

$host = "localhost";
$nomebd = "filmesdb";
$bdusuario = "root";
$bdsenha = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$nomebd", $bdusuario, $bdsenha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
} catch (PDOException $e) {
    die("Conexão Falhou: " . $e->getMessage());    
}

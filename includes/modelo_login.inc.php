<?php

declare(strict_types=1);

function get_user(object $pdo, string $usuario) {

    $query = "SELECT * FROM usuarios WHERE usuario = :usuario;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;

}
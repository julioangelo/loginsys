<?php

declare(strict_types=1);

function pegar_usuario(object $pdo, string $usuario) 
{
    $query = "SELECT usuario FROM usuarios WHERE usuario = :usuario;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

function pegar_email(object $pdo, string $email) 
{
    $query = "SELECT email FROM usuarios WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}

function set_user(object $pdo, string $usuario, string $senha, string $email) {
    $query = "INSERT INTO usuarios (usuario, senha, email) VALUES (:usuario, :senha, :email);";
    $stmt = $pdo->prepare($query);

    $options = [
        "cost" => 12
    ];
    $hashedPwd = password_hash($senha, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":senha", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

}
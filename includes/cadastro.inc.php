<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];

    try {

        require_once "dbh.inc.php";
        require_once "modelo_cadastro.inc.php";
        require_once "contr_cadastro.inc.php";

        // PREVENÇÃO DE ERROS
        $erros = [];


        if (input_vazio($usuario, $senha, $email) ) {
            $erros["input_vazio"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Preencha todos os campos! <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }
        if (email_invalido($email) ) {
            $erros["invalid_email"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> E-mail inválido utilizado <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }
        if (usuario_tomado($pdo, $usuario) ) {
            $erros["taken_username"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Esse usuário já existe! <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }
        if (email_registrado($pdo, $email) ) {
            $erros["email_used"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Esse E-mail já existe! <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }

        require_once "config_session.inc.php";

        if ($erros) {
            $_SESSION["errors_signup"] = $erros;

            $signupData = [
                "usuario" => $usuario,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }

        criar_usuario($pdo, $usuario, $senha, $email);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Falhou: " . $e->getMessage());    
    }
    
} else {
    header("Location: ../index.php");
    die();
}
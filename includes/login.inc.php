<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    try {
        require_once "dbh.inc.php";
        require_once "modelo_login.inc.php";
        require_once "contr_login.inc.php"; 

        // PREVENÇÃO DE ERROS
        $erros = [];


        if (input_vazio($usuario, $senha) ) {
            $erros["input_vazio"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Preencha todos os campos! </div>';
        }

        $result = get_user($pdo, $usuario);

        if (is_username_wrong($result)) {
            $erros["login_incorrect"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Informações de Login incorretas! <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }
        if (!is_username_wrong($result) && is_password_wrong($senha, $result["senha"])) {
            $erros["login_incorrect"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Informações de Login incorretas! <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        }

        require_once "config_session.inc.php";

        if ($erros) {
            $_SESSION["errors_login"] = $erros;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["usuario"]);

        $_SESSION["ultima_regeneracao"] = time();

        header("Location: ../index.php?login=success");

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
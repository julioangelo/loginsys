<?php

declare(strict_types=1);

function output_username() {
    if (isset($_SESSION["user_id"])) {
        echo "Você está logado como " . $_SESSION["user_username"];
    } else {
        echo "Você não está logado";
    }
}

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $erros = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($erros as $erro) {
            echo '<p>' . $erro . '</p>';
        }

        unset($_SESSION["errors_login"]);
    }
    else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        Usuário logado com sucesso!<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    }
}
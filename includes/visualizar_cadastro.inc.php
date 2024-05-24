<?php

declare(strict_types=1);

function input_cadastro() {
    if (isset($_SESSION["signup_data"]["usuario"]) && !isset($_SESSION["errors_signup"]["taken_username"])) {
        echo '<input class="text-center input-field" id="usuario" required="" type="text" name="usuario" placeholder="Nome de usuario" value="' . $_SESSION["signup_data"]["usuario"] . '">';
    } else {
        echo '<input class="text-center input-field" id="usuario" required="" type="text" name="usuario" placeholder="Nome de usuario">';
    }

    echo '<input class="text-center input-field" id="senha" required="" type="password" name="senha" placeholder="Senha">';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input class="text-center input-field" id="email" required="" type="text" name="email" placeholder="E-Mail" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input class="text-center input-field" id="email" required="" type="text" name="email" placeholder="E-Mail">';
    }
   
}

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $erros = $_SESSION["errors_signup"];

        echo "<br>";

        foreach ($erros as $erro) {
            echo '<p class="form-error">' . $erro .'</p>';
        }

        unset($_SESSION["errors_signup"]);

    }else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        Usuário cadastrado com sucesso!<button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    }
}
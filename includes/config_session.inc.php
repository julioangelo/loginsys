<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => "localhost",
    "path" => "/",
    "secure" => true,
    "httponly" => true
]);

session_start();

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["ultima_regeneracao"])) {
        regenerar_id_da_sessao_logado();
    } else {
        $intervalo = 60 * 30;
        if (time() - $_SESSION["ultima_regeneracao"] >= $intervalo) {
            regenerar_id_da_sessao_logado();
        }
    }
} else {
    if (!isset($_SESSION["ultima_regeneracao"])) {
        regenerar_id_da_sessao();
    } else {
        $intervalo = 60 * 30;
        if (time() - $_SESSION["ultima_regeneracao"] >= $intervalo) {
            regenerar_id_da_sessao();
        }
    }
}

function regenerar_id_da_sessao() {
    session_regenerate_id(true);
    $_SESSION["ultima_regeneracao"] = time();
}
function regenerar_id_da_sessao_logado() {
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);


    $_SESSION["ultima_regeneracao"] = time();
}
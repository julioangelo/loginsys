<?php

declare(strict_types=1);

function input_vazio(string $usuario, string $senha) {
    if (empty($usuario) || empty($senha)) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong(bool|array $result) {
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $senha, string $hashedPwd) {
    if (!password_verify($senha, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}
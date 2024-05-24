<?php

declare(strict_types=1);

function input_vazio(string $usuario, string $senha, string $email) 
{
    if (empty($usuario) || empty($senha) || empty($email)) {
        return true;

    } else {
        return false;
    }
}

function email_invalido(string $email) 
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function usuario_tomado(object $pdo, string $usuario) 
{
    if (pegar_usuario($pdo, $usuario) ) {
        return true;
    } else {
        return false;
    }
}

function email_registrado(object $pdo, string $email) 
{
    if (pegar_email($pdo, $email) ) {
        return true;
    } else {
        return false;
    }
}

function criar_usuario(object $pdo, string $usuario, string $senha, string $email) 
{
    set_user($pdo, $usuario, $senha, $email);
}



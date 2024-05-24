<?php
require_once "includes/visualizar_cadastro.inc.php";
require_once "includes/config_session.inc.php";
require_once "includes/visualizar_login.inc.php";
require_once "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicativo Web</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .input-field {
            display: block;
            margin: 10px auto;
            text-align: center; 
        }
    </style>

</head>

<body>

    <main>

        <h4>
            <?php
            output_username();
            ?>
        </h4>

        <?php
        if (!isset($_SESSION["user_id"])) { ?>
            <h3 class="display-5 text-center">Login</h3><br>

            <form class="text-center" action="includes/login.inc.php" method="post">
                <input class="text-center" id="usuario" required="" type="text" name="usuario" placeholder="Nome de usuario"><br><br>
                <input class="text-center" id="senha" required="" type="password" name="senha" placeholder="Senha"><br><br>
                <button class="btn btn-secondary text-center">Entrar</button><br><br>
            </form>
        <?php } ?>

        <?php
        check_login_errors();
        ?>

        <?php
        if (!isset($_SESSION["user_id"])) { ?>
            <h3 class="display-5 text-center">Cadastrar-se</h3><br>

            <form class="text-center" action="includes/cadastro.inc.php" method="post">
                 <?php
                input_cadastro()
                ?>
                <button class="btn btn-secondary">Entrar</button><br><br><br>
            </form>
        <?php } ?>

        <?php
        check_signup_errors();
        ?>
        <?php
        if (isset($_SESSION["user_id"])) { ?>
            <h3>Logout</h3>

            <form action="includes/logout.inc.php" method="post">
                <button>Sair</button>
            </form>
        <?php } ?>

        <?php
        if (isset($_SESSION["user_id"])) { ?>
            <h3 class="display-5 text-center">Seus Filmes</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Filme</th>
                        <th scope="col">Diretor</th>
                        <th scope="col">Ator</th>
                        <th scope="col">Avaliação</th>
                        <th scope="col">Premiação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <?php

                if (isset($_POST["add_entry"])) {

                }

                if (isset($_POST["edit_entry"])) {

                }

                if (isset($_POST["delete_entry"])) {

                }

                $entries = [
                    ["Filme 1", "Diretor 1", "Ator 1", "Avaliação 1", "Premiação 1"],
                    ["Filme 2", "Diretor 2", "Ator 2", "Avaliação 2", "Premiação 2"],

                ];
                ?>
                 <tbody>
                    <?php foreach ($entries as $entry) { ?>
                        <tr>
                            <td><?= $entry[0] ?></td>
                            <td><?= $entry[1] ?></td>
                            <td><?= $entry[2] ?></td>
                            <td><?= $entry[3] ?></td>
                            <td><?= $entry[4] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="edit_entry" value="<?= $entry[0] ?>">
                                    <button class="btn btn-primary">Editar</button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="delete_entry" value="<?= $entry[0] ?>">
                                    <button class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="" method="post">
                <button class="btn btn-success" name="add_entry">Adicionar Novo Filme</button>
            </form>
                </table>
        <?php } ?>

    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
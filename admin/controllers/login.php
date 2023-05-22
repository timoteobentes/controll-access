<?php

    require_once("../../../searchhotels/admin/model/admin.html");
    require_once("../../../searchhotels/admin/model/admindao.html");

    $cpf = $_POST["cpf"];
    $senha = md5($_POST["senha"]);

    $Admin = new Admin();

    $Admin->setCpf($cpf);
    $Admin->setSenha($senha);

    $login = AdminDAO::login($Admin);

    if(!isset($_SESSION)) {
        session_start();
    }

    $nome = $login->getNome();
    $nome = explode(" ", $nome);

    $_SESSION["Logado"] = $nome[0];
    header("location: ../view/main.html");

?>
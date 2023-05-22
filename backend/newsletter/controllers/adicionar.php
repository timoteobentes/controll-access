<?php

    require_once("../../../backend/newsletter/model/newsletter.html");
    require_once("../../../backend/newsletter/model/newsletterdao.html");

    $nome = $_POST['nome'];
    $email = $_POST['email'] ?? null;

    $Newsletter = new Newsletter();

    $Newsletter->setNome($nome);
    $Newsletter->setEmail($email);

    $add = NewsletterDAO::insert($Newsletter);

    if($add) {
        // $_SESSION["Nome"] = $username;
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION["NewsOk"] = "NewsOk";
        header("location: ../../../view/main.html");
    } else {
        $_SESSION["NewsFail"] = "Erro ao Cadastrar!";
        header("location: ../../../view/main.html");
    }

?>
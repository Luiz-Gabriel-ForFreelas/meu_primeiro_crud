<?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    session_destroy();
    header("location: /projetos/projeto_puc_fullstack/index.php");
    exit();
?>
<?php
    session_start();

    //Apagando todos os dados da sessão:
    session_unset();
    //Destruindo a sessão:
    session_destroy();
    header('Location: index.php');
?>
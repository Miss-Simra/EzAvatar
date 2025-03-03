<?php

    //~ Initialise ou transmet la session
    session_start(); 

    //~ Définitons des fonctions
    include '../inc.functions.php';

    setDeconnecte();

    header('Location: index.php');
    exit();
    
?>
<?php


    $username = "azerty@hotmail.fr";
    $password = "azerty";

    if( isset($_POST['username']) && isset($_POST['password']) ){

        if($_POST['username'] == $username && $_POST['password'] == $password){
            session_start();
            $_SESSION['user'] = $username;
            echo "Bienvenue";
        }
        else{
            echo "Il y a une erreur";
        }

    }

?>

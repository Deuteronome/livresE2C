<?php
    session_start();
    $message = "";
    require_once('../model/Model.php');
    //var_dump($_POST);

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if($email == null || $password == null) {
        $message = "information manquante";
        //header("location: ../controller/homeController.php");
    } else {
        $bdd = new Model();

        $user = $bdd->getUserByEmail($email);

        if(!$user) {
            $message = "Compte inexistant";
        } else if($password != $user["password"]) {
            $message = "Mot de passe incorrect";
        } else {
            $_SESSION["id"] = $user["id"];
            $_SESSION["pseudo"] = $user["pseudo"];
            header("location: ../controller/homeController.php");
        }
    }

    if($message != "") {
        header("location: ../controller/homeController.php?message=$message");
    }
    
    //var_dump($user);


    
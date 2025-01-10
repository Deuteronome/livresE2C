<?php
    session_start();
    $title = "Des jeux";
    $subtitle = "Pour se muscler l'esprit";

    $navButtons = 
    [
        [
            "label" => "Accueil",
            "path" => "../controller/homeController.php"
        ],
        [
            "label" => "Bibliothèque",
            "path" => "../controller/libraryController.php"
        ],
        [
            "label" => "Espace détente",
            "path" => "../controller/gameController.php"
        ],
        [
            "label" => "Qui sommes nous?",
            "path" => "../controller/usController.php"
        ],
    ];

    if(isset($_SESSION["id"])) {
        $navButtons[]= [
            "label" => "Mon compte",
            "path" => "../controller/accountController.php"
        ];
    }

    require_once("../view/gameView.php");


<?php
    session_start();
    $title = "Qui sommes nous";
    $subtitle = "La dream team de la prépa numérique";

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

    require_once("../view/usView.php");


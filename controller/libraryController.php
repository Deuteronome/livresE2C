<?php
    session_start();
    require_once('../model/Model.php');

    $bdd=new Model();
    $bookList = $bdd->getAllBooks();

    //var_dump($bookList);
    //var_dump($username);
    $title = "Faites votre choix";
    $subtitle = "Y en a pour tous les goûts";

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
    
    require_once("../view/libraryView.php");



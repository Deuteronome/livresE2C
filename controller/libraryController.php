<?php
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
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silence On Lit</title>
    <link rel="stylesheet" href="../style/style.css">
    <script type="module" src="../script/nav.js"></script>
</head>
<body>
    <?php
        require_once("../module/_header.php");
        require_once("../module/_nav.php");
    ?>



    <main>
        
    </main>

    <div id="trigger"></div>
</body>
</html>
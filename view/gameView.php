<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-wpage/library.htmidth, initial-scale=1.0">
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
        <div id="menu-zone"></div>
            <label for="menu">Choix du jeu</label>
            <select name="menu" id="menu">
                <option value="0" selected="true">-Faites votre choix-</option>
                <option value="1">Morpion</option>
            </select>
        <div id="gameZone"></div>
    </main>

    <div id="trigger"></div>
</body>
</html>
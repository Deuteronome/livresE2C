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
        <div id="book-table">
            <div id="head-line">
                <div class="title">Titre</div>
                <div class="author">Auteur</div>
                <div class="genre">Genre</div>
                <div class="date">Date</div>
                <div class="link"></div>
            </div>
            <?php
                foreach($bookList AS $book) {
                ?>
                    <div class="book-line">
                        <div class="title"><?= $book["titre"] ?></div>
                        <div class="author"><?= $book["auteur"] ?></div>
                        <div class="genre"><?= $book["genre"] ?></div>
                        <div class="date"><?= $book["date"] ?></div>
                        <div class="link"></div>
                    </div>
                <?php
                }
            ?>
        </div>
    </main>

    <div id="trigger"></div>
</body>
</html>
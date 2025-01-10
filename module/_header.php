<header>
        <img src="../asset/logo.png" alt="logo E2C" id="logo">
        <div id="titres">
            <h1><?=$title ?></h1>
            <h2><?=$subtitle ?></h2>
        </div>
        <div id="logForm">
            <?php
                if(isset($_SESSION["id"])){
                    $username = $_SESSION["pseudo"];
                ?>
                    <p><?= "Bonjour $username" ?></p>
                <?php
                }else {
                ?>
                <form method="post" action="../controller/loginController.php" id="login-form">
                    <div class="form-line">
                        <label for="email">Votre email : </label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-line">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" required> 
                    </div>
                    <?php
                        if(isset($_GET["message"])){
                        ?>
                            <div class="message"><?= $_GET["message"] ?></div>
                        <?php
                        }
                    ?>
                    <div class="form-line">
                        <input type="submit" value="Se connecter" class="login-bouton">
                    </div>       
                                 
                    
                </form><?php
                } ?>
        </div>
</header>

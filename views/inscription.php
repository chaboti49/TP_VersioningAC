<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
    </head>
    <body>
        <div class="block-connexion">
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="/inscr" method="POST">
                <h1>Inscription</h1>

                <?php if(!empty($erreur)){?>
                    <div class="alert alert-danger"><?= $erreur?></div>
                <?php } ?>
                <label><b>Nom d'utilisateur :</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

                <label><b>Mot De Passe :</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>

                <label><b>Confirmation :</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="Cmdp" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                // Code de vérification 
                ?>
            </form>
    </body>
</html>

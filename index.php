<?php
    function testgenre($valeur) {
        if (isset($valeur) && !empty($valeur) && !is_null(($valeur))){
            return true;
        }
        return false;
    }
    echo ("0");
    $user = "blabla";
    $pass = "blabla";
    $bdd = new PDO('mysql:host=localhost:3306;dbname=bibliotheque', $user, $pass);
    if( testgenre($_POST) ) {

        if( testgenre($_POST["livregenre"]) ) {
            $sql_insert = "INSERT INTO genres (`genrelivre`) VALUES (:livregenre)";
            $stmt = $bdd->prepare($sql_insert);
            $stmt->execute(['livregenre' => $_POST["livregenre"]]);
        }
    }

    $sql = "SELECT * FROM genres ;";
    $genres = $bdd->query($sql)->fetchAll();
    function testauteur($valeur) {
        if (isset($valeur) && !empty($valeur) && !is_null(($valeur))){
            return true;
        }
        return false;
    }
    if( testauteur($_POST) ) {

        if( testauteur($_POST["auteurnom"]) ) {
            $sql_insert = "INSERT INTO auteurs (`nomauteur`) VALUES (:auteurnom)";
            $stmt = $bdd->prepare($sql_insert);
            $stmt->execute(['auteurnom' => $_POST["auteurnom"]]);
        }
    }
    $sql = "SELECT * FROM auteurs ;";
    $auteurs = $bdd->query($sql)->fetchAll();
?>
<!DOCTYPE HTML>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libraries</title>
</head>
<header>
<table border="1" >
        <thead>
            <tr>
                <th>Titres</th>
                <th>Auteurs</th>
                <th>Genres</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($genres as $genress): ?>
                <tr>
                    <td><?php echo($auteurss["titre"]); ?></td>
                    <td><?php echo($auteurss["nomauteur"]); ?></td>
                    <td><?php echo($genress["genrelivre"]); ?></td>
                    <td>
                        <button>modifier</button>
                        <button>supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method= "post">
        <input type="text" name="livregenre" placeholder="Genre">
        <input type="submit" value="Envoyer">
    </form>
</header>
<body>
    <table border="1" >
        <thead>
            <tr>
                <!-- <th>Auteurs</th> -->
                <th>Genre</th>
                
                <!-- <th>Titres</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($genres as $genress): ?>
                <tr>
                    <td><?php echo($genress["genrelivre"]); ?></td>
                    <td>
                        <button>modifier</button>
                        <button>supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method= "post">
        <input type="text" name="livregenre" placeholder="Genre">
        <input type="submit" value="Envoyer">
    </form>
</body>
<div>
<table border="1" >
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($auteurs as $auteurss): ?>
                <tr>
                    <td><?php echo($auteurss["nomauteur"]); ?></td>
                    <td>
                        <button>modifier</button>
                        <button>supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method= "post">
        <input type="text" name="auteurnom" placeholder="Auteur">
        <input type="submit" value="Envoyer">
    </form>
</div>
</html>

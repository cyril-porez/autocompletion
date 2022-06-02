<?php
     try {
        $bdd = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

   /* $resultat = $_GET['search'];
    $pilote = explode(" ", $resultat);
    $nom = $pilote[0];
    $prenom = $pilote[1];

    $sql = 'SELECT * from pilote_moto_gp where nom = :nom and prenom = :prenom';
    $verif = $bdd->prepare($sql);
    $verif->execute(array(':nom' => $nom, ':prenom' => $prenom));
    $users = $verif->fetchall(PDO::FETCH_ASSOC);*/

    $id = intval($_GET['id']);

    $sql = 'SELECT * from pilote_moto_gp where id = :id';
    $verif = $bdd->prepare($sql);
    $verif->execute(array(':id' => $id));
    $users = $verif->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="element.css">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main id='element'>
        <div>
            <?php  foreach($users as $user) :?>
                <img src="<?= $user['image'] ?>" alt="pilote Moto GP">
                        
                <p><?= $user['nom'] . ' ' . $user['prenom'] ?></p>
            <?php endforeach ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>
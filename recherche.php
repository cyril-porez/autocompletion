<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $resultat = $_GET['search'];
    

    $sql = "SELECT * FROM pilote_moto_gp WHERE nom LIKE :resultat or prenom LIKE :resultat";
    $verif = $bdd->prepare($sql);
    $verif->execute(array(':resultat' => $resultat . '%'));
    $users = $verif->fetchall(PDO::FETCH_ASSOC);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recherche.css">
    <title></title>
</head>
<body>
    <footer>
        <header>

        </header>
        <main id='recherche'>
            <div>
                <?php  foreach($users as $user) :?>
                        <a href="element.php?id=<?= $user['id'] ?>">
                        <img src="<?= $user['image'] ?>" alt="pilote Moto GP">
                        
                        <p><?= $user['nom'] . ' ' . $user['prenom'] ?></p>
                        
                
                    </a>
                    <?php endforeach ?>
            </div>
        </main>
        <footer>

        </footer>
    </footer>
</body>
</html>
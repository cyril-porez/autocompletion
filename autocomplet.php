<?php

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


    if (!empty($_POST['recherche'])) {
        $data = htmlspecialchars($_POST['recherche']);
        $recherche = $bdd->prepare("SELECT * FROM pilote_moto_gp WHERE nom LIKE '$data%' or prenom LIKE '$data%'"); //or prenom LIKE "%'.$data.'%" or moto LIKE "%'.$data.'%" or ecurie LIKE "%'.$data.'%" ORDER BY id desc'
        $recherche->execute();
        $recherchePilote = $recherche->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($recherchePilote);
    }
?>
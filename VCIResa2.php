<?php
$serveur = "localhost";
$user= "root";
$password = "";
$bdd = "video";  /** Attention à bien externaliser les paramètres de la base de données (bdd) **/

// PARTIE TRAITEMENT PHP 
include("entete.php");
include("VCITitre.php");
include("VCIMenu.html");
require_once "config/config.php";
require_once "config/database.php";

// connection à la base
$db=connectDb();

echo"je suis connecté à Resa2";

// affichage de la page entête

try {
 
    $cnx = new PDO('mysql:host='.$serveur.';dbname='.$bdd, $user, $password);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $error) {
    echo 'N° : '.$error->getCode().'<br />';
    die ('Erreur : '.$error->getMessage().'<br />');
}
$reponse = $cnx->query("select * from film where CODE_TYPE_FILM = 'action' + 'animation' + 'comedie' + 'horreur' + 'policier' + 'science fiction'");
$results = $reponse->fetchAll(PDO::FETCH_OBJ);
var_dump($results);
?>
<!-- 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Vidéo Club</title>
</head>
<body>
    <table>
        <th>
            <tr>Titre du Film</tr>
            <tr>Son année</tr>
            <tr>Réalisateur</tr>
            <tr>Affiche</tr>
        </th>
        
    </table>
    <input type="button" value="Autre type de films"></input>
    <input type="button" value="Retour Accueil"></input>
</body>
</html> -->
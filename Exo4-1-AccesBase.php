<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acces aux Bases</title>
</head>

<body>
    <?PHP //Connexion à la base de donnée
    $NomHote = 'localhost';
    $NomBDD = 'videoclub';
    $Login = 'root';
    $Password = 'paradoxe0311';

    try {
        $ConnexionBDD = new PDO('mysql:host=' . $NomHote . ';dbname=' . $NomBDD . ';charset=utf8', $Login, $Password);
        $ConnexionBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'connexion reussie' . '</br>';
        echo '</br>';
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    ?>

    <?PHP //Recupération des informations et création de la requette
    // ATTENTION VOUS DEVRIEZ VERIFIER QUE LE $_POST ou $_GET CONTIENT QUELQUE CHOSE
    $Choix = $_GET["Selection"]; // Reponse possible choix1 ou choix2 ou choix3 ou choix4

    $Bool = false;

    // ON CONSTRUIT LA REQUETTE SQL

    $Requette = 'SELECT * FROM repertoire ORDER BY ';


    switch ($Choix) {
        case 'choix1':
            echo ('Classement par noms' . '</br>');
            // Je termine la requete en rajoutant 'nom pour l'ORDER BY 
            $Requette .= 'nom'; // $Requette = $Requette + le reste de ce que je rajoute
            // La requete finit est donc : SELECT * FROM repertoire ORDER BY nom
            break;

        case 'choix2':
            echo ('Classement par prénoms' . '</br>');
            $Requette .= 'prenom';
            break;

        case 'choix3':
            echo ('Classement par ages' . '</br>');
            $Requette .= 'age';
            break;

        case 'choix4':
            echo ('Moyenne d\'age des insccrits' . '</br>');
            $Requette = 'SELECT ROUND(AVG(age)) as MoyenneAGE FROM repertoire';
            $Bool = true;
            break;

        default:
            echo ('Merci de faire un choix...' . '</br>');
            break;
    }

    // ON ENVOIE LA REQUETTE A LA BDD ET ON RECUPERE LA REPONSE DANS LA VARIABLE $ResultatRequette

    //ResultatRequette = $ConnexionBDD->query($Requette) or die(print_r($ConnexionBDD->errorInfo()));

    $ResultatRequette = $ConnexionBDD->prepare($Requette);
    $ResultatRequette->execute() or die(print_r($ConnexionBDD->errorInfo()));

    // SI LE BOOLEEN EST A VRAI ON AFFICHE LA REPONSE POUR LA MOYENNE D'AGE
    if ($Bool) {
        $Informations = $ResultatRequette->fetch(PDO::FETCH_OBJ);
        echo ('La moyenne d\'age est de : ' . ($Informations->MoyenneAGE) . ' ans' . '</br>');
    }
    // SINON ON CONSTRUIT LA REPONSE POUR L'AFFICHAGE DES CLASSEMENTS
    else {
        /*
        while ($Informations = $ResultatRequette->fetch()) {
            echo '</br>' .
                $Informations['nom'] . '</br>' .
                $Informations['prenom'] . '</br>' .
                $Informations['adresse'] . '</br>' .
                '<hr />' .
                $Informations['age'] . '</br>' .
                '<hr />';
        }
        
            while ($Informations = $ResultatRequette->fetch(PDO::FETCH_OBJ))
                {
                echo '</br>'.
                $Informations->nom.'</br>'.
                $Informations->prenom.'</br>'.
                $Informations->adresse.'</br>'.
                '<hr />'.
                $Informations->age.'</br>'.
                '<hr />';
                }
          
            $informations = $ResultatRequette->fetchAll();
            foreach($informations as $info){
                echo '</br>'.
                    $info['nom'].'</br>'.
                    $info['prenom'].'</br>'.
                    '<hr />'.
                    $info['age'].'</br>'.
                    '<hr />';
            }
        */     
            $informations = $ResultatRequette->fetchAll(PDO::FETCH_OBJ);
            foreach($informations as $info){
                echo '</br>'.
                $info->nom.'</br>'.
                $info->prenom.'</br>'.
                $info->adresse.'</br>'.
                '<hr />'.
                $info->age.'</br>'.
                '<hr />';       
        }
        
    }
    $ResultatRequette->closeCursor();
    $ConnexionBDD = null;
    ?>
</body>

</html>
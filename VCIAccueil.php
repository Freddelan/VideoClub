<!-- 
ICI on va construire le corps de notre page en venant inclure l'entete et le pied que nous avons déja codé

il faut donc inséré ces fichier grâce à la fonction include ou require
avec le include on peut choisir ou exactement j'insere le fichier (plus adapté dans notre cas)
avec le require on appelle le fichier qu'on va avoir besoin mais il faut ensuite "appeler la portion de code" que l'on va avoir besoin

Libre choix au développeur de choisir la manière dont il va utiliser ces fichiers.
-->
<?php
// J'inclue ici en début de page l'entete donc je récupere l'intégralité du contenu de entete.php
include("entete.php");
?>
<!-- 
Coeur de la page 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container-fluid">
    <?php
    // J'inclue ici le fichier VCITitre.php qui contient le bloc necesessaire ( la partie titre + date en gros mon "header" de ma page html)
    include("VCITitre.php");
    // Je lance la fonction titre site pour afficher le contenu de cette fonction. (technique que l'on va prendre l'habitude d'utiliser en mode MVC)
    titreSite();
    ?>
    <div class="row">
        <?PHP
        // J'inclue ici mon menu en allant recupérer la page html VCIMenu.html
        include("VCIMenu.html");
        ?>

        <div class="col-12 col-md-10">
            <div id="tete">
                <h4 class="text-center">BIENVENUE SUR LE SITE DU VIDEO CLUB !</h4>
            </div>
            <div id="corps" class="text-center">
                <img src="src/pictures/DesignVideoClub/BackGroundHCAc.jpg" alt="Rideau cinéma" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>
</body>
</html>
<style>
  /* @keyframes tipsy {
  0 {
    transform: translateX(-50%) translateY(-50%) rotate(0deg);
  }
  100% {
    transform: translateX(-50%) translateY(-50%) rotate(360deg);
  }
}

body {
  font-family: helvetica, arial, sans-serif;
  background-color: #2e2e31;
}

a {
  color: #fffbf1;
  text-shadow: 0 20px 25px #2e2e31, 0 40px 60px #2e2e31;
  font-size: 80px;
  font-weight: bold;
  text-decoration: none;
  letter-spacing: -3px;
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
}

a:before,
a:after {
  content: '';
  padding: .9em .4em;
  position: absolute;
  left: 50%;
  width: 100%;
  top: 50%;
  display: block;
  border: 15px solid red;
  transform: translateX(-50%) translateY(-50%) rotate(0deg);
  animation: 10s infinite alternate ease-in-out tipsy;
}

a:before {
  border-color: #d9524a #d9524a rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
  z-index: -1;
}

a:after {
  border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #d9524a #d9524a;
  box-shadow: 25px 25px 25px rgba(46, 46, 49, .8);
} 
</style>

<?php
// J'inclue ici en fin de page la fin de mon code html donc je récupere l'intégralité du contenu de pied.php
include("pied.php");
?>

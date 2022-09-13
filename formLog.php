<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="verification.php" method="POST">
        <label>Login</label>
        <input type="text" required>

        <label>Pass</label>
        <input type="text" required>

        <input type="button" value="retour">

        <input type="button" value="Ok">

        <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
        ?>
    </form>
</body>

</html>
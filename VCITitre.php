<body>
    <h3>test</h3>
    <?php titreSite() ?>
</body>
<?php

function titreSite()
{
    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $today = $formatter->format(time());
?>   
<div class="row">
    <div class="col-2">
        <img src="pictures/pictures/DesignVideoClub/Popcorn-Picks.jpg" alt="logo Video Club" class="img-fluid w-100">
    </div>
    <div class="col-10 col-lg-7 col-xl-8 align-self-center">
        <h1 class="text-center">VIDEO CLUB</h1>
        <h2 class="text-center">... et si on se faisait une petite toile</h2>
    </div>
    <div class="col-12 col-lg-3 col-xl-2">

        <p><?=$today;?></p>

        <div id="Admin">
            <span>Admin</span>
        </div>
        <div id="sous-Admin" class="d-none">
            <form method="post" action="VCIAdmin.php">
                <div class="mb-3">
                    <label for="inputLogin" class="form-label">Login :</label>
                    <input type="text" class="form-control col" id="inputLogin" name="Nom_Admin">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password :</label>
                    <input type="password" class="form-control" id="inputPassword" name="Pass_Admin">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Entrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}
?>
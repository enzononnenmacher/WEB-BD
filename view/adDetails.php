<?php
/**
 * @file     adDetails.php
 * @brief    This file is designed to display whatever ad details
 * @author   Created by Kevin.VAUCHER
 * @version  15.03.2021
 */

$title = "Détails";

ob_start();
?>
<header class="section background-primary text-center">
    <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Détail de l'annonce</h1>
</header>
<div class="section background-white">
    <div class="line">
        <div class="margin">
            <div class="row1">
                <img  class="zoom2" src="<?=$article['inputPictures'] ?>" alt="">
            </div>
            <div class="row2">
                <br><strong>Nom du propriétaire :</strong> <a class="size-texte3"><?=$article['inputName']; ?></a><br>
                <strong>Adresse : </strong><a class="size-texte3"><?=$article['inputAddress']; ?></a><br>
                <strong>Code postal : </strong><a class="size-texte3"><?=$article['inputNPA']; ?></a><br>
                <strong>Ville : </strong><a class="size-texte3"><?=$article['inputCity']; ?></a><br>
                <strong>Date de disponibilité : </strong><a class="size-texte3"><?=$article['inputAvailableDate']; ?></a><br>
                <strong>Prix : </strong><a class="size-texte3"><?=$article['inputPrice']; ?> CHF</a><br><br>
                <a class="size-texte3"><?=$article['inputDescription']; ?></a><br><br>
            </div>
            <div class="row1">
                <br><strong>Nom de l'annonce :</strong> <br>
                <a class="size-texte3"><?=$article['inputNameAnnonce']; ?></a><br><br><br>
            </div>
            <div class="row2">
                <a href="mailto:<?=$article['Email']; ?>" class="submit-form button background-primary border-radius text-white">Envoyer un message à l'annonceur</a>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>

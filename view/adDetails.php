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
            <div class="split left">
                <div class="row">
                <?php foreach ($images as $image) :?>
                        <div class="column">
                            <img src="<?=$image['name'] ?>" class="images101"  style="width:100%" onclick="myFunction(this);">
                        </div>
                <?php endforeach?>
                </div>
                <div class="container">
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                    <img id="expandedImg" style="width:100%">
                </div>
            </div>
            <div class="split right">
                <div class="row2">
                    <br><strong>Nom du propriétaire :</strong> <a class="size-texte3"><?=$article['owner']; ?></a><br>
                    <strong>Adresse : </strong><a class="size-texte3"><?=$article['address']; ?></a><br>
                    <strong>Code postal : </strong><a class="size-texte3"><?=$article['NPA']; ?></a><br>
                    <strong>Ville : </strong><a class="size-texte3"><?=$article['city']; ?></a><br>
                    <strong>Date de disponibilité : </strong><a class="size-texte3"><?=$article['disponibility']; ?></a><br>
                    <strong>Prix : </strong><a class="size-texte3"><?=$article['price']; ?> CHF</a><br><br>
                    <a class="size-texte3"><?=$article['description']; ?></a><br><br>
                </div>
                <div class="row1">
                    <br><strong>Nom de l'annonce :</strong> <br>
                    <a class="size-texte3"><?=$article['title']; ?></a><br><br><br>
                </div>
                <div class="row2">
                    <a href="mailto:<?=$article['email']; ?>" class="submit-form button background-primary border-radius text-white">Envoyer un message à l'annonceur</a>
                </div>

                <div>
                    <?php if (!isset($bookmarks[$article['id']])) : ?>
                        <?php if (isset($_SESSION['userEmailAddress'])) :?>
                            <?php if ($article['email'] != $_SESSION['userEmailAddress']) :?>
                            <a href="index.php?action=bookmark&id=<?=$article['id']; ?>" class="submit-form button background-primary border-radius text-white">Bookmark</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
        </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>

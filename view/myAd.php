<?php
/**
 * @File : contact.php
 * @Brief : Displays contact page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */

$title = 'my ads';

ob_start();
?>

    <main role="main">
        <!-- Content -->
        <article>
            <header class="section background-primary text-center">
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Mes Annonces</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">


                        <?php foreach($articles as $article) :?>
                            <div class="s-12 m-12 l-4 margin-m-bottom div-row">
                                <br>
                                <a href="../index.php?action=adDetails&ID=<?= $article['ID']; ?>"><img src="<?=$article['inputPictures'];?>" alt="" class="zoom"></a>
                                <a href="../index.php?action=adDetails&ID=<?= $article['ID']; ?>"><br><strong><?=$article['inputNameAnnonce']; ?></strong><br></a>
                                <a><?=$article['inputPrice']; ?> CHF</a><br>
                                <a><?=$article['inputCity']; ?></a>



                                <a class="text-more-info text-primary-hover" href="../index.php?action=modifAd&ID=<?= $article['ID']; ?>">Modifier</a>
                                <?php if($article['active'] == true): ?>
                                    <a class="text-more-info text-primary-hover" href="../index.php?action=deleteArticle&ID=<?= $article['ID']; ?>">Supprimer</a>
                                <?php else: ?>
                                    <a class="text-more-info text-primary-hover" href="../index.php?action=deleteArticle&ID=<?= $article['ID']; ?>">Réactiver</a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </article>
    </main>
<?php

$content = ob_get_clean();
require 'gabarit.php';
?>
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


                        <?php foreach ($articles as $article) : ?>
                                <div class="s-12 m-12 l-4 margin-m-bottom div-row">
                                    <a>
                                        <?php $counter =0;?>
                                        <a href="../index.php?action=adDetails&ID=<?= $article['id']; ?>"><?php foreach($images as $image) :?>

                                                <?php if($image['ads_id'] == $article['id'] && $counter == 0) :?>
                                                    <?php $counter =1;?>
                                                    <img src="<?= $image['name']?>" alt="" class="zoom">
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </a>
                                        <a href="../index.php?action=adDetails&ID=<?= $article['id']; ?>"><br><strong><?= $article['title']; ?></strong><br></a>
                                        <?= $article['price']; ?> CHF<br>
                                        <?= $article['city']; ?><br><br>
                                        <a class="text-more-info text-primary-hover" href="../index.php?action=modifAd&ID=<?= $article['id']; ?>">Modifier</a>
                                        <?php if($article['active'] == true): ?>
                                            <a class="text-more-info text-primary-hover" href="../index.php?action=deleteArticle&active=0&ID=<?= $article['id']; ?>">Supprimer</a>
                                        <?php else: ?>
                                            <a class="text-more-info text-primary-hover" href="../index.php?action=deleteArticle&active=1&ID=<?= $article['id']; ?>">Réactiver</a>
                                        <?php endif; ?>
                                    </a>

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
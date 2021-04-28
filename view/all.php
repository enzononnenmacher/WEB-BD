<?php

/**
 * @File : all.php
 * @Brief : Displays galllery
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Author : Updated by Ivan STOJILOVIC
 * @Version : 14-03-2021
 */


$title = 'Annonces';

ob_start();
?>
    <!-- MAIN -->
    <main role="main">
        <!-- Content -->
        <article>
            <header class="section background-primary text-center">
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Annonces</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">


                        <?php foreach ($articles as $article) : ?>
                            <?php if ($article['active'] == true) : ?>
                                <div class="s-12 m-12 l-4 margin-m-bottom div-row">
                                    <a>
                                        <a href="../index.php?action=adDetails&ID=<?= $article['ID']; ?>"><img src="<?= $article['inputPictures']; ?>" alt="" class="zoom"></a>
                                        <a href="../index.php?action=adDetails&ID=<?= $article['ID']; ?>"><br><strong><?= $article['inputNameAnnonce']; ?></strong><br></a>
                                        <?= $article['inputPrice']; ?> CHF<br>
                                        <?= $article['inputCity']; ?><br><br>
                                    </a>
                                </div>
                            <?php endif; ?>
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
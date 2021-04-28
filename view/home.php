<?php

/**
 * @File : home.php
 * @Brief : Displays homepage
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'home';

ob_start();
?>
<!-- MAIN -->
<main role="main">
    <!-- Main Carousel -->
    <section class="section background-dark">
        <div class="line">
            <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
                <div class="item">
                    <div class="s-12 center">
                        <img class="imgAcceuil" src="view/img/Suisse.png" alt="">
                        <div class="carousel-content">
                            <div class="padding-2x">
                                <div class="s-12 m-12 l-8">
                                    <p class="text-black text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">
                                        Appartement <br> colocation</p>
                                    <p class="text-black text-size-16 margin-bottom-40">Bon site de colocation.<br>ColoSwiss.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="line">
            <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
                <div class="item">
                    <div class="s-12 center">
                        <img class="imgAcceuil" src="view/img/portfolio/appart.jpg" alt="">
                        <div class="carousel-content">
                            <div class="padding-2x">
                                <div class="s-12 m-12 l-8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 1 -->
    <section class="section background-white">
        <div class="line">
            <div class="margin">
                <?php $count = 0; ?>
                <?php foreach ($articles as $article) : ?>
                    <?php if (($article['active'] == true) && ($count <= 2)) : ?>
                        <div class="s-12 m-12 l-4 margin-m-bottom div-row">
                            <a>
                                <a href="../index.php?action=adDetails&ID=<?= $article['ID']; ?>"><img src="<?= $article['inputPictures']; ?>" alt="" class="zoom"></a>
                                <a href="../index.php?action=adDetails&ID=<?= $article['ID']; ?>"><br><strong><?= $article['inputNameAnnonce']; ?></strong><br></a>
                                <?= $article['inputPrice']; ?> CHF<br>
                                <?= $article['inputCity']; ?><br><br>
                            </a>
                        </div>
                        <?php $count ++ ; ?>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>

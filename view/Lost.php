<?php

/**
 * @File : lost.php
 * @Brief : Displays lost page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'Lost';

ob_start();
?>
<!-- MAIN -->
<main role="main">
    <!-- Content -->
    <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Erreur 404</h1>
        </header>
        <!-- Contact Form -->
    </article>
    <div class="background-primary padding text-center">
        <a href="/"><i class="icon-facebook_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-twitter_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-google_plus_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-instagram_circle icon2x text-white"></i></a>
    </div>
    <!-- MAP -->
    <div class="s-12 grayscale center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1459734.5702753505!2d16.91089086619977!3d48.577103681657675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssk!2ssk!4v1457640551761"
                width="100%" height="450" frameborder="0" style="border:0"></iframe>
    </div>
</main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>

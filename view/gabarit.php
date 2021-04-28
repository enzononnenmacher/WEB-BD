<?php
/**
 * @File : gabarit.php
 * @Brief : Displays gabarit on every page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
      <link rel="icon" href="view/img/logo/Logo.png">
    <link rel="stylesheet" href="view/css/components.css">
    <link rel="stylesheet" href="view/css/icons.css">
    <link rel="stylesheet" href="view/css/responsee.css">
    <link rel="stylesheet" href="view/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="view/owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="view/css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="view/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="view/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="view/js/validation.js"></script>
  </head>  
  
  <body class="size-1140">
  	    <!-- HEADER -->
    <header role="banner">    

      <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2">
            <a href="index.php?action=home"><img class="logo" src="view/img/logo/logo.png" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            
            <ul class="right chevron">
              <li><a href="index.php?action=home">Accueil</a></li>
              <li><a href="index.php?action=all">Annonces</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
                <?php if(isset($_SESSION['userEmailAddress'])): ?>
                    <li><a href="index.php?action=logout">Déconnexion / <?= $_SESSION['userEmailAddress'] ?></a></li>
                    <li><a href="index.php?action=myAd">Mes annonces</a></li>
                    <li><a href="index.php?action=createAd">Créer une annonce</a></li>
                <?php elseif(!isset($_SESSION['userEmailAddress'])): ?>
                    <li><a href="index.php?action=login">Connexion</a></li>
                    <li><a href="index.php?action=register">S'inscrire</a></li>
                <?php endif; ?>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <?=$content; ?>

    <!-- FOOTER -->
    <footer>
      <!-- Social -->
      <div class="background-primary padding text-center">
        <a href="https://www.facebook.com/"><i class="icon-facebook_circle icon2x text-white"></i></a>
        <a href="https://twitter.com/"><i class="icon-twitter_circle icon2x text-white"></i></a>
        <a href="https://plus.google.com/"><i class="icon-google_plus_circle icon2x text-white"></i></a>
        <a href="https://www.instagram.com/"><i class="icon-instagram_circle icon2x text-white"></i></a>
      </div>
      
      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Our Philosophy</h4>
              <p class="text-size-20"><em>"We are routers between people"</em><p>
                            
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30">About Our Company</h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="/"><img src="img/blog-04.jpg" alt=""></a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>We are base in Sainte-Croix, Vaud, Switzerland</p>
                    <a class="text-more-info text-primary-hover" href="/">Read more</a>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Contact Us</h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><b>Adress:</b> Avenue De La Gare 26, Sainte-Croix, Vaud, Switzerland</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><a href="/" class="text-primary-hover"><b>E-mail:</b> coloswiss@gmail.com</a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-smartphone text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><b>Phone:</b> 079 895 91 73</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-twitter text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><a href="https://twitter.com/" class="text-primary-hover"><b>Twitter</b></a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-facebook text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11">
                  <p><a href="https://www.facebook.com/" class="text-primary-hover"><b>Facebook</b></a></p>
                </div>
              </div>
            </div>


      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12"><br>Copyright 2019, Vision Design - Cold Zero</p>
            <p class="text-size-12">All images are taken bought or taken by project members.</p>
          </div>
          <div class="s-12 l-6">
            <a class="right text-size-12" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework"><br>Design and coding<br> Cold Zero Team</a>
          </div>
        </div>
      </section>
    <script type="text/javascript" src="view/js/responsee.js"></script>
    <script type="text/javascript" src="view/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="view/js/template-scripts.js"></script>
   </body>
</html>
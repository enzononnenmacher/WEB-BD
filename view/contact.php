<?php

/**
 * @File : contact.php
 * @Brief : Displays contact page
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Kevin VAUCHER
 * @Version : 17-02-2021
 */


$title = 'Contacts';

ob_start();
?>

    <!-- MAIN -->
    <main role="main">
        <!-- Content -->
        <article>
            <header class="section background-primary text-center">
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Contacter-nous</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">

                        <!-- Company Information -->
                        <div class="row1">
                            <h2 class="text-uppercase text-strong margin-bottom-30">Information de l'entreprise</h2>
                            <div class="float-left">
                                <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80 margin-bottom">
                                <h4 class="text-strong margin-bottom-0">Adresse</h4>
                                <p>Avenue De La Gare 26<br>
                                    Sainte-Croix<br>
                                    Vaud, Switzerland
                                </p>
                            </div>

                            <div class="float-left">
                                <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80 margin-bottom">
                                <h4 class="text-strong margin-bottom-0">E-mail</h4>
                                <p>coloswiss@gmail.com<br><br></p>
                            </div>

                            <div class="float-left">
                                <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80">
                                <h4 class="text-strong margin-bottom-0">Phone Number</h4>
                                <p>079 895 91 73</p>
                            </div>
                        </div>
                        <div class="row2">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2730.222466963225!2d6.499039744013124!3d46.81962010787476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478db87426529131%3A0xec2e6acb9c6b7910!2sAvenue%20de%20la%20Gare%2026%2C%201450%20Sainte-Croix!5e0!3m2!1sfr!2sch!4v1617213284581!5m2!1sfr!2sch" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                </div>
            </div>
        </article>


    </main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
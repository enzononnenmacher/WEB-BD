<?php

/**
 * @File : register.php
 * @Brief : Displays register page
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
                <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Enregistrement</h1>
            </header>
            <div class="section background-white">
                <div class="line">
                    <div class="margin">

                        <!-- Company Information -->
                        <div class="s-12 m-12 l-6">
                            <h2 class="text-uppercase text-strong margin-bottom-30">Company Information</h2>
                            <div class="float-left">
                                <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80 margin-bottom">
                                <h4 class="text-strong margin-bottom-0">Company Address</h4>
                                <p>Avenue De La Gare 26,<br>
                                    Sainte-Croix, Vaud,<br>
                                    Switzerland</p>
                            </div>
                            <div class="float-left">
                                <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80 margin-bottom">
                                <h4 class="text-strong margin-bottom-0">E-mail</h4>
                                <p>coloswiss@gmail.com</p><br><br>
                            </div>
                            <div class="float-left">
                                <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                            </div>
                            <div class="margin-left-80">
                                <h4 class="text-strong margin-bottom-0">Phone Number</h4>
                                <p>079 895 91 73
                                </p>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="s-12 m-12 l-6">
                            <h2 class="text-uppercase text-strong margin-bottom-30">Enregistrement</h2>
                            <form class="customform" action="../index.php?action=register" method="post">
                                <div class="line">
                                    <div class="margin">
                                        <div class="s-12 m-12 l-6">
                                            <div class="form-group">
                                                <label for="inputEmail">Email address *</label>
                                                <input class="form-control" type="email" name="inputUserEmailAddress"
                                                       id="inputEmail" aria-describedby="emailHelp"
                                                       placeholder="firstname@domain.ch" required>
                                                <small class="form-text text-muted" id="emailHelp">We'll never share
                                                    your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password *</label>
                                                <input class="form-control" type="password" name="inputUserPsw"
                                                       id="inputPassword" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputConfirmPassword">Password confirm *</label>
                                                <input class="form-control" type="password" name="inputUserPswRepeat"
                                                       id="inputConfirmPassword" placeholder="PasswordConfirm" required>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(isset($registerErrorMessage)): ?>
                                        <p>Email déjà utilisé</p>
                                    <?php elseif(!isset($registerErrorMessage)): ?>
                                        <?php if(isset($registerPswErrorMessage)): ?>
                                            <p>Mot de passe identique</p>
                                        <?php elseif(!isset($registerPswErrorMessage)): ?>

                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="s-12 m-12 l-4">
                                        <button class="submit-form button background-primary border-radius text-white"
                                                type="submit">S'enregistrer
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
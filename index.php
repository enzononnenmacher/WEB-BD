<?php

/**
 * @File : index.php
 * @Brief : Calls functions from controllers to display the right pages
 * @Author : Created by Shanshe GUNDISHVILI
 * @Author : Updated by Shanshe GUNDISHVILI
 * @Version : 17-02-2021
 */ 

require "controler/annonce.php";
require "controler/users.php";
require "controler/navigation.php";

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'register' :
            if(isset($_POST['inputUserEmailAddress'])){
                register($_POST);
            }else{
                regForm();
            }
            break;
        case 'modifUserInfo' :
            if(isset($_GET['act'])){
                if ($_GET['act'] == "email"){
                    modifyUserEmailC($_POST);
                }else if ($_GET['act'] == "password"){
                    modifyUserPassC($_POST);
                }
            }else{
                modifUserInfoForm();
            }
            break;
        case 'about' :
            about();
            break;
        case 'all' :
            all();
            break;
        case 'createAd' :
            createAd();
            break;
        case 'annonce' :
            creationAnnonce($_POST);
            break;
        case 'contact' :
            contact();
            break;
        case 'myAd' :
            myAd($_SESSION['userEmailAddress']);
            break;
        case 'adDetails' :
            adDetails($_GET['ID']);
            break;
        case 'modifAd' :
            if(isset($_GET['code'])) {
                modifyForm($_POST, $_GET['code']);
            }
            elseif (isset($_GET['ID'])){
                modifyAnnonce($_GET['ID']);
            }
            break;
        case 'deleteArticle' :
            deleteArt($_GET['ID']);
            break;
        default :
            lost();
    }
} else {
    home();
}
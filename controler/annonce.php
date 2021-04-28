<?php
/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to link view and model of articles
 */






/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send new article's info to model
 */
function annonce($data){

    require "model/annonceManager.php";
    annonceToJson($data);
    require "view/home.php";

}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send information of all articles from model to view
 */
function all(){

    require "model/annonceManager.php";
    $temp = jsonToAnnonce();
    $articles = array_reverse($temp);
    require "view/all.php";
}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send information of only articles that are created by the Email used by client
 */
function myAd($email){

    require "model/annonceManager.php";
    $temp = jsonToMyAnnonce($email);
    if(isset($temp)){
    $articles = array_reverse($temp);
    require "view/myAd.php";
    } else{
        require "view/createAd.php";
    }

}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send information of one particular article
 */
function adDetails($ID){

    require "model/annonceManager.php";
    $article = detailForAd($ID);
    require "view/adDetails.php";

}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send info of one particular article that client user wants to modify
 */
function modifyForm($data , $code){

    require "model/annonceManager.php";
    modifAnn($data, $code);
    $articles = jsonToMyAnnonce($_SESSION['userEmailAddress']);
    require "view/myAd.php";

}

/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send the information that client user modified in one particular article
 */
function modifyAnnonce($ID){

        require "model/annonceManager.php";
        $article = detailForAd($ID);
        require "view/modifyAd.php";

}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send the ID of the one particular article that user wants deleted
 */
function deleteArt($ID){

    require "model/annonceManager.php";
    deleteAnn($ID);
    $articles = jsonToMyAnnonce($_SESSION['userEmailAddress']);
    require "view/myAd.php";

}
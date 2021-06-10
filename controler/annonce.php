<?php
/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to link view and model of articles
 */



/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send information of all articles from model to view
 */
function all(){

    try{
        require_once "model/annonceManager.php";
        //récuperer les articles de la BD envoyés par le modèle
        $articles = getArticles();
        $images = getImages();

    }
    catch (ModelDataException $ex){
        $articleErrorMessage = "Nous rencontrons temporairement un problème technique pour afficher nos produits. Désolé du dérangement";
    } finally {
        require_once "view/all.php";
    }
}





/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send information of one particular article
 */
function adDetails($code){

    try{
        require_once  "model/articlesManager.php";
        //récuperer les articles de la BD envoyés par le modèle
        $article = getArticleDetail ($code);
    }catch(ModelDataException $ex){
        $articleErrorMessages = "Nous rencontrons temporairement des problèmes technique pour afficher nos produits";
    } finally {
        require_once "view/article-detail.php";
    }

}




/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send new article's info to model
 */
function creationAnnonce($data){

    try {
        if(isset($data)) {
            require_once "model/annonceManager.php";
            createArticle($data['inputName'], $data['inputAddress'], $data['inputNPA'], $data['inputCity'], $data['inputNameAnnonce'], $data['inputDescription'], $data['inputAvailableDate'], $data['inputPrice']);
        }
        else{
            require_once "view/createAd.php";
        }

    }catch (ModelDataException $ex){
        $articleErrorMessage = "coin";
    } finally {
        home();
    }

}





/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send information of only articles that are created by the Email used by client
 */
function myAd($email){

    require "model/annonceManager.php";
    $articles = bdToMyAnnonce($email);
    if(isset($articles)){
    $images = getImages();
    require "view/myAd.php";
    } else{
        require "view/createAd.php";
    }

}





/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send info of one particular article that client user wants to modify
 */
function modifyForm($codeInitial){

    try{
        require_once "model/annonceManager.php";
        $article = getArticleByID($codeInitial);
    }catch(ModelDataException $ex){
        $articleErrorMessages = "delete";
    } finally {
        require_once "view/modifyAd.php";
    }

}

/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send the information that client user modified in one particular article
 */
function modifyAnnonce($codeInitial ,$data, $active){

    try {
        require_once "model/annonceManager.php";
        updateArticle($codeInitial, $data['owner'], $data['address'], $data['NPA'], $data['city'], $data['title'], $data['description'], $data['disponibility'], $data['price'], $active);
    }catch(ModelDataException $ex){
        $articleErrorMessages = "delete";
    } finally {
        myAd($_SESSION['userEmailAddress']);
    }

}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send the ID of the one particular article that user wants deleted
 */
function deleteArt($ID, $active){

    require "model/annonceManager.php";
    deleteAnn($ID, $active);
    $articles = bdToMyAnnonce($_SESSION['userEmailAddress']);
    $images = getImages();
    require "view/myAd.php";

}


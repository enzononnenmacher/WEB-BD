<?php
/**
 * @author : Shanshe Gundishvili
 * @date : 03/01/2021
 * @Goal : to link view and model of articles
 */


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of all articles from model to view
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





/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of one specific article from model to view
 */
function adDetails($code){

    try{
        require_once  "model/annonceManager.php";
        //récuperer les articles de la BD envoyés par le modèle
        $article = getArticleByID($code);
        $images = getImagesByID($code);
        if(isset($_COOKIE['bookmarks'])){
            $bookmarks = getBookmark();
        }else{
            $bookmarks['checker'] = "checker";
        }

    }catch(ModelDataException $ex){
        $articleErrorMessages = "Nous rencontrons temporairement des problèmes technique pour afficher nos produits";
    } finally {
        require_once "view/adDetails.php";
    }

}




/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of new article from view to model
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





/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of all articles from model to view that is of the user in session
 */
function myAd($email){

    require_once "model/annonceManager.php";
    $articles = bdToMyAnnonce($email);
    if(isset($articles[0])){
    $images = getImages();
    require_once "view/myAd.php";
    } else{
        require_once "view/createAd.php";
    }

}





/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send to send client to modify one specific article
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

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of one specific articles from view to model
 */
function modifyAnnonce($codeInitial ,$data){

    try {

        if($_FILES['inputPictures']['name'][0] != ""){
            require_once "model/annonceManager.php";
            updateImages($codeInitial);
        }
        require_once "model/annonceManager.php";
        updateArticle($codeInitial, $data['owner'], $data['address'], $data['NPA'], $data['city'], $data['title'], $data['description'], $data['disponibility'], $data['price']);
    }catch(ModelDataException $ex){
        $articleErrorMessages = "delete";
    } finally {
        myAd($_SESSION['userEmailAddress']);
    }

}


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of one specific article to delete in model
 */
function deleteArt($ID, $active){

    require "model/annonceManager.php";
    deleteAnn($ID, $active);
    $articles = bdToMyAnnonce($_SESSION['userEmailAddress']);
    $images = getImages();
    require "view/myAd.php";

}


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of one specific article to model to bookmark it
 */
function bookmark($id){
    require_once 'model/annonceManager.php';
    bookmarkAnn($id);
    all();
}

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to redirect client to bookmarks, and to fetch information about bookmarked articles
 */
function bookmarks(){

    require_once 'model/annonceManager.php';
    $bookmarks = getBookmark();
    if(isset($bookmarks)&&!empty($bookmarks)){
        $articles = getArticles();
        $images = getImages();
        require_once 'view/bookmarks.php';
    }else{
        all();
    }

}


/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to send information of one specific article that needs to be deleted from bookmarks
 */
function delBookmarks($id){
    require_once 'model/annonceManager.php';
    $bookmarks = delBookmarksM($id);
    if(isset($bookmarks)&&!empty($bookmarks)){
        $articles = getArticles();
        $images = getImages();
        require_once 'view/bookmarks.php';
    }else{
        all();
    }
}

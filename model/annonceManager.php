<?php

/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to menage articles
 */


/*
 * author : Shanshe Gundishvili
 * date : 03/29/2021
 * Goal : to save the info of images in Json and to save image in Directory
 */
function imageSave($userID)
{

    $numAnn = countAnn($userID);
    $v = ',';
    $s = '"';

    $countfiles = count($_FILES['inputPictures']['name']);
    $queryId = "SELECT MAX(id) FROM ads WHERE users_id =" . $userID;
    $adId = executeQuerySelect($queryId);
    // Looping all files
    for ($i = 0; $i < $countfiles; $i++) {

        $ext = pathinfo($_FILES['inputPictures']['name'][$i], PATHINFO_EXTENSION);
        $filename = $userID . "-" . $numAnn . "-" . $i;
        $fileDest = 'data/images/' . $filename . "." . $ext;
        // Upload file
        move_uploaded_file($_FILES['inputPictures']['tmp_name'][$i], $fileDest);

        $query = "INSERT INTO images (name, ads_id) VALUES (" . $s . $fileDest . $s . ", " . $adId[0][0] . ");";

        executeQueryInsert($query);
    }

}

function updateImages($codeInitial){

    $query = "DELETE FROM images WHERE ads_id='".$codeInitial."';";
    require_once "model/dbConnector.php";
    executeQueryInsert($query);

    $s = '"';
    if(is_array($_FILES['inputPictures']['name'])) {
        $countfiles = count($_FILES['inputPictures']['name']);
        $alone = false;
    }else{
        $countfiles = 1;
        $alone = true;
    }
    $adId = $codeInitial;
    // Looping all files
    for ($i = 0; $i < $countfiles; $i++) {
        $unique = uniqid();

        // Upload file
        if($alone){
            $ext = pathinfo($_FILES['inputPictures']['name'], PATHINFO_EXTENSION);
            $fileDest = 'data/images/' . $unique . "." . $ext;
            move_uploaded_file($_FILES['inputPictures']['tmp_name'], $fileDest);
        }else {
            $ext = pathinfo($_FILES['inputPictures']['name'][$i], PATHINFO_EXTENSION);
            $fileDest = 'data/images/' . $unique . "." . $ext;
            move_uploaded_file($_FILES['inputPictures']['tmp_name'][$i], $fileDest);
        }

        $query = "INSERT INTO images (name, ads_id) VALUES (" . $s . $fileDest . $s . ", " . $adId . ");";

        executeQueryInsert($query);
    }



}


function countAnn($userID)
{

    $query = "SELECT COUNT(ads.id) FROM ads WHERE users_id =" . $userID;
    $result = executeQuerySelect($query);
    return $result[0][0];
}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to save information filled by User
 */
function createArticle($inputName, $inputAddress, $inputNPA, $inputCity, $inputNameAnnonce, $inputDescription, $inputAvailableDate, $inputPrice)
{
    $active = 1;
    $userID = getId();
    $v = ',';
    $s = '"';

    $query = "INSERT INTO ads (owner, address, NPA, city, title, description, disponibility, price, active, users_id) VALUES(" . $s . $inputName . $s . $v . $s . $inputAddress . $s . $v . $inputNPA . $v . $s . $inputCity . $s . $v . $s . $inputNameAnnonce . $s . $v . $s . $inputDescription . $s . $v . $s . $inputAvailableDate . $s . $v . $inputPrice . $v . $active . $v . $userID . ");";

    require_once "model/dbConnector.php";
    $result = executeQueryInsert($query);
    if(isset($_FILES['inputPictures'])){
    imageSave($userID);
    }


}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to delete or reactivate the article
 */
function deleteAnn($IDToDEL, $active)
{

    if ($active == 0) {
        $query = "UPDATE ads SET active = 0 WHERE id = ".$IDToDEL.";";
    }

    if ($active == 1) {
        $query = "UPDATE ads SET active = 1 WHERE id = ".$IDToDEL.";";
    }
require_once "model/dbConnector.php";
    executeQueryInsert($query);


}
    /*
     * author : Shanshe Gundishvili
     * date : 03/01/2021
     * Goal : to send saved information to view of all the articles
     */
    function GetArticles()
    {
        $results = false;
        $strSeparator = '\'';

        $query = 'SELECT ads.id, owner, address, NPA, city, title, description, disponibility, price, active, users.email FROM ads 
    INNER JOIN users 
    ON ads.users_id = users.id';

        require_once "model/dbConnector.php";


        return executeQuerySelect($query);
    }


    function getImages()
    {

        $query = "SELECT name, ads_id FROM images";

        require_once "model/dbConnector.php";
        return executeQuerySelect($query);
    }

    function getImagesByID($id)
    {

        $query = "SELECT name, ads_id FROM images WHERE ads_id =".$id.";";

        require_once "model/dbConnector.php";
        return executeQuerySelect($query);
    }

    /*
     * author : Shanshe Gundishvili
     * date : 03/01/2021
     * Goal : to only send the articles made by user that is logged in on the side by device
     */
    function bdToMyAnnonce($email)
    {
        $id = getId($email);
        $snowDetail = "SELECT id, owner, address, NPA, city, title, description, disponibility, price, active FROM ads WHERE users_id='" . $id . "';";


        require_once "model/dbConnector.php";

        $result = executeQuerySelect($snowDetail);
        return $result;
    }


    function getId()
    {


        $email = $_SESSION['userEmailAddress'];
        $snowDetail = "SELECT id FROM users WHERE email='" . $email . "'";

        require_once "model/dbConnector.php";

        $result = executeQuerySelect($snowDetail);
        return $result[0][0];
    }


    /*
     * author : Shanshe Gundishvili
     * date : 03/01/2021
     * Goal : to only send one particular article's information
     */
    function detailForAd($ID)
    {
        $Detail = "SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active, description, descriptionFull FROM snows WHERE id='" . $ID . "'";


        require_once "model/dbConnector.php";

        $result = executeQuerySelect($Detail);
        return $result[0];
    }


    function getArticleByID($codeInitial)
    {

        $query = "SELECT id, owner, address, NPA, city, title, description, disponibility, price, active, users_id  FROM ads WHERE id='" . $codeInitial . "';";

        require_once "model/dbConnector.php";

        $result = executeQuerySelect($query);

        $result[0]['email'] = getEmail($result[0]['users_id']);
        return $result[0];
    }

    function getEmail($id){
        $query = "SELECT email FROM users WHERE id = ".$id.";";

        require_once "model/dbConnector.php";

        $result = executeQuerySelect($query);

        return $result[0][0];
    }



    function updateArticle($IDInitial, $owner, $address, $NPA, $city, $title, $description, $disponibility, $price)
    {

        $v = ',';
        $str = '"';

        $query = 'UPDATE ads SET ' . "owner =" . $str . $owner . $str . ", address =" . $str . $address . $str . ", NPA = " . $NPA . ", city =" . $str . $city . $str . ", title =" . $str . $title . $str . ", description =" . $str . $description . $str . ", disponibility =" . $str . $disponibility . $str . ", price =" . $price . " WHERE id =" . $IDInitial . ';';
        require_once "model/dbConnector.php";
        executeQueryInsert($query);
    }

    function bookmarkAnn($id){

        if(isset($_COOKIE['bookmarks'])){
            $data = unserialize($_COOKIE['bookmarks'], ["allowed_classes" => false]);
            $data[$id] = $id;
            setcookie("bookmarks","", time() - 3600, '/');
        }else{
            $data[$id] = $id;
        }
        setcookie("bookmarks", serialize($data), time() + 2592000);


    }
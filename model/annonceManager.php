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
function imageSave($ID){

    $fileName = $_FILES['inputPictures']['name'];
    $fileTmpName = $_FILES['inputPictures']['tmp_name'];
    $fileSize = $_FILES['inputPictures']['size'];
    $fileError = $_FILES['inputPictures']['error'];

    $tmpFileExt = explode('.', $fileName);
    $fileExt = strtolower(end($tmpFileExt));

    $allowed = array('jpeg', 'jpg', 'png');


    $fName =     $fName = $_SESSION['userEmailAddress']."-".$ID;;

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = $fName . "." . $fileExt;
                $fileDestination = "data/images/" . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {

                echo "le fichier est trop grand!";
            }
        } else {
            echo "il y a eu une erreur lors du chargement!";
        }
    } else {
        echo "vous ne pouvez pas uploader des fichiers de ce type!";
    }




    return $fileDestination;

}




/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to save information filled by User
 */
function annonceToJson($data)
{


    $snowDetail="SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active, description, descriptionFull FROM snows WHERE code='".$data."'";



    require_once "model/dbConnector.php";

    $result=executeQuerySelect($snowDetail);
    return $result[0];
}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to delete or reactivate the article
 */
function deleteAnn($IDToDEL)
{
    $arrayDef['eee'] = "aweqw";
    $arrayDef = json_decode(file_get_contents("data/annonce.json"), true);
    $count = 0;
    foreach ($arrayDef as $article) {
        if ($article['ID'] == $IDToDEL) {

            if($article['active'] == true){
                $arrayDef[$count]['active'] = false;
            }

            if($article['active'] == false){
                $arrayDef[$count]['active'] = true;
            }
        }else{
            $count++;
        }
    }



    file_put_contents("data/annonce.json", json_encode($arrayDef));
}

/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to modify existing article
 */
function modifAnn($toInsert, $IDToDEL)
{
    $v = ',';
    $str = '"';
    $snowUpdate = 'UPDATE snows SET '."code =".$str.$codeNew.$str.", brand =".$str.$brand.$str.", model =".$str.$model.$str.", snowLength =".$snowLength.", audience =".$str.$audience.$str.", qtyAvailable =".$qtyAvailable.", description =".$str.$description.$str.", price =".$price.", descriptionFull =".$str.$descriptionFull.$str.", level =".$str.$level.$str.", photo =".$str.$photo.$str.", active =".$active." WHERE code =" .$str.$code.$str.';';

    require_once "model/dbConnector.php";
    return executeQueryInsert($snowUpdate);
}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to send saved information to view of all the articles
 */
function jsonToAnnonce()
{
    $results= false;
    $strSeparator = '\'';

    $snowQuery='SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active FROM snows';

    require_once "model/dbConnector.php";


    return executeQuerySelect($snowQuery);
}


/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to only send the articles made by user that is logged in on the side by device
 */
function bdToMyAnnonce($email)
{

    $snowDetail="SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active, description, descriptionFull FROM snows WHERE Email='".$email."'";



    require_once "model/dbConnector.php";

    $result=executeQuerySelect($snowDetail);
    return $result[0];
}

/*
 * author : Shanshe Gundishvili
 * date : 03/01/2021
 * Goal : to only send one particular article's information
 */
function detailForAd($ID)
{
    $snowDetail="SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active, description, descriptionFull FROM snows WHERE code='".$code."'";



    require_once "model/dbConnector.php";

    $result=executeQuerySelect($snowDetail);
    return $result[0];
}


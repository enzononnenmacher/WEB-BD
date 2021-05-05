<?php
/**
 * @param $userEmailAddress
 * @param $userPsw
 */
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;

    $userPswHash= password_hash($userPsw,PASSWORD_DEFAULT);

    $strSeparator = '\'';
    //requete pour recuperer le psw de la bd du login concerné
    $loginQuery = 'SELECT userHashPsw FROM users WHERE userEmailAddress='.$strSeparator.$userEmailAddress.$strSeparator.";";

    require "model/dbConnector.php";

    $queryResult = executeQuerySelect($loginQuery);

    if (count($queryResult)==1){

        //Recuperation du password de la BD
        $userPswHash = $queryResult[0]['userHashPsw'];
        //Comparaison avec le password du formulaire
        $result = password_verify($userPsw, $userPswHash);
    }

    return $result;
}

function regsiterNewAccount($userEmailAddress, $userPsw){

    $result=false;
    $strSeparator = '\'';
    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $registerQuery ="INSERT INTO users (userEmailAddress, userHashPsw) VALUES(" . $userEmailAddress. ", ". $userHashPsw . ")";
    $queryResult=executeQueryInsert($registerQuery);
    if($queryResult){
        $result = $queryResult;
    }
}


function getUserType($userEmailAddress)
{

    $strSeparator = '\'';
    $userTypeQuery = 'SELECT userType FROM users WHERE userEmailAddress='.$strSeparator.$userEmailAddress.$strSeparator.";";


    $queryResult = executeQuerySelect($userTypeQuery);

    if(isset($queryResult)){
        if($queryResult[0]['userType']==1) $_SESSION['userType']=1;
        elseif ($queryResult[0]['userType']==0) $_SESSION['userType']=0;
    }
}


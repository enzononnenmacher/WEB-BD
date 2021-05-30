<?php
/**
 * @param $userEmailAddress
 * @param $userPsw
 */
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;



    $strSeparator = '\'';
    //requete pour recuperer le psw de la bd du login concerné
    $loginQuery = 'SELECT password FROM users WHERE email='.$strSeparator.$userEmailAddress.$strSeparator.";";

    require "model/dbConnector.php";

    $queryResult = executeQuerySelect($loginQuery);

    if (isset($queryResult[0]['password'])){

        //Recuperation du password de la BD
        $userPswHash = $queryResult[0]['password'];
        //Comparaison avec le password du formulaire
        $result = password_verify($userPsw, $userPswHash);
    }

    return $result;
}

function registerNewAccount($userEmailAddress, $userPsw){

    $result=false;
    $strSeparator = '\'';
    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $registerQuery ="INSERT INTO users (email, password, userType) VALUES(" .$strSeparator. $userEmailAddress.$strSeparator. ", ".$strSeparator. $userHashPsw .$strSeparator.", " . 0 . ")";
    require_once "model/dbConnector.php";
    $queryResult=executeQueryInsert($registerQuery);

    $result = 1;
    return $result;
}


function getUserType($userEmailAddress)
{

    $strSeparator = '\'';
    $userTypeQuery = 'SELECT userType FROM users WHERE email='.$strSeparator.$userEmailAddress.$strSeparator.";";

    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($userTypeQuery);

    if(isset($queryResult)){
        if($queryResult[0]['userType']==1) $_SESSION['userType']=1;
        elseif ($queryResult[0]['userType']==0) $_SESSION['userType']=0;
    }
}

function checkRegister($email){

    $strSeparator = '\'';
    $userTypeQuery = 'SELECT email FROM users WHERE email='.$strSeparator.$email.$strSeparator.";";

    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($userTypeQuery);

    return $queryResult;

}


function modifyUserPassM($email, $password){

    $result=false;
    $strSeparator = '\'';
    $userHashPsw = password_hash($password, PASSWORD_DEFAULT);
    $Query ="UPDATE users SET password =" . $strSeparator . $userHashPsw . $strSeparator . " WHERE email =". $strSeparator . $email . $strSeparator. ";";
    require_once "model/dbConnector.php";
    $queryResult=executeQueryInsert($Query);

    $result = 1;
    return $result;
}

function modifyUserEmailM($FEmail, $NEmail){

    $result=false;
    $strSeparator = '\'';
    $Query ="UPDATE users SET email =" . $strSeparator . $FEmail . $strSeparator . " WHERE email =". $strSeparator . $NEmail . $strSeparator. ";";
    require_once "model/dbConnector.php";
    $queryResult=executeQueryInsert($Query);

    $result = 1;
    return $result;
}
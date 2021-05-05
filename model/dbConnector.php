<?php

function executeQuerySelect($query){
    $queryResult=null;

    $dbConnexion =openDBConnexion();
    if ($dbConnexion != null){
        $statement =$dbConnexion->prepare($query); // preparation de la requete
        $statement->execute(); // execution de la requete
        $queryResult = $statement->fetchAll(); //preparation des resultats pour le client

    }
    $dbConnexion = null; //fermeture de ma connexion à la BD
    return $queryResult;
}

/**
 * @brief   This function is designed to insert data value in database
 * @param $query
 * @return null
 */

function executeQueryInsert($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion(); // Ouvre la connexion à la BD
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);
        $statement->execute();
    }
    $dbConnexion = null;
    return $queryResult;
}

function openDBConnexion(){
    $tempDBConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'coloSwiss';
    $userName = 'WebConnector';
    $userPwd = '123qweasD!';
    $dsn = $sqlDriver.':host='.$hostname.';dbname='.$dbName.';port='.$port.';charset='.$charset;
    try{
        $tempDBConnexion = new PDO($dsn, $userName, $userPwd);
    }
    catch(PDOException $exception){
        echo 'Connexion failed'.$exception->getMessage();
    }
    return $tempDBConnexion;
}

//Classe pour gérer les exceptions liees au modele
class ModelDataExecption extends Exception{

}
<?php
/**
 * @file      usersManager.php
 * @brief     This model is designed to implements users business logic
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

/**
 * @brief This function is designed to verify user's login
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : users's password
 * @return bool : "true" only if the user and psw match the database. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */

function getUsers()
{
    //Cette fonction renvoie un tableau avec les users
    $tab =  json_decode(file_get_contents("data/users.json"),true); // by default, return everything as an associative array
    return $tab; //renvoi du tableau

}

function updateUsers($users){

    //Cette fonction réécrit tout le fichier users.json à partir du tableau associatif
    file_put_contents("data/users.json",json_encode($users));

}
function isLoginCorrect($userEmailAddress, $userPsw)
{
    $result = false;
    //lire tous les users
    $users=getUsers();

    foreach($users as $user){
        if ($user["userEmailAddress"]==$userEmailAddress) {
            $result = password_verify($userPsw, $user["userHashPsw"]);
        }
    }

    return $result;
}

/**
 * @brief This function is designed to register a new account
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : user's password
 * @return bool : "true" only if the user doesn't already exist. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function registerNewAccount($userEmailAddress, $userPsw)
{
    //lire le fichier des users
    if(registerCheck($userEmailAddress) <= 0) {


        $result = false;
        $users = getUsers();
        $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);

        //Ajouter la ligne de l'email(on pourrait vérifier s'il existe)
        $users[] = array('userEmailAddress' => $userEmailAddress, "userHashPsw" => $userHashPsw);

        //réécrire le fichier des users
        updateUsers($users);
        return true;
    }else{

        return false;


    }

}

/**
 *
 * @param $email
 * @return bool
 */
function registerCheck($email){
    $result = 0;
    //lire tous les users
    $users=getUsers();

    foreach($users as $user){
        if ($user["userEmailAddress"]==$email) {
            $result = 1;
        }

    }

    return $result;
}



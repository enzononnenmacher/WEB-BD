<?php /**
 * @file users.php
 * @@brief     This file is the rooter managing the link with controllers.
 * @param $loginRequest
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 * @author    Created by Pascal.BENZONANA
 */


function login($loginRequest)
{
    if (isset($loginRequest['inputUserEmailAddress']) && isset($loginRequest['inputUserPsw'])){
        $userEmailAddress = $loginRequest['inputUserEmailAddress'];
        $userPsw = $loginRequest['inputUserPsw'];

        //tester les donnees di formulaire dans le modele

        require "model/usersManager.php";
        if (isLoginCorrect($userEmailAddress, $userPsw))
        {
            getUserType($userEmailAddress);
            $_SESSION['userEmailAddress']=$userEmailAddress;
            require "view/home.php";

        }
        else
        {
            require "view/login.php";
        }
    }
    else { //donnes non remplies

        require "view/login.php";
    }
}



function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}

function register($registerRequest)
{
        try {
            if (isset($registerRequest['inputUserEmailAddress']) && isset($registerRequest['inputUserPsw']) && isset($registerRequest['inputUserPswRepeat'])) {

                $userEmailAddress = $registerRequest['inputUserEmailAddress'];
                $userPsw = $registerRequest['inputUserPsw'];
                $userPswRepeat = $registerRequest['inputUserPswRepeat'];

                //check passwords are same
                if ($userPsw == $userPswRepeat) {
                    require_once "model/usersManager.php";
                    if (registerNewAccount($userEmailAddress, $userPsw)) {
                        $_SESSION['userEmailAddress'] = $userEmailAddress;
                        $registerErrorMessage = null;
                    } else {
                        $registerErrorMessage = "our developers don't know the reason of this error";
                        require_once "view/register.php";
                    }
                } else {
                    $registerErrorMessage = "passwords are different";
                    require_once "view/register.php";
                }
                require_once "view/register.php";
            }
        } catch (ModelDataBaseException $ex) {
            $registerErrorMessage = "we are dead";
            return "view/lost.php";
        }
}



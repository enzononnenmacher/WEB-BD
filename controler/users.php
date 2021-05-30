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
    $error = 0;
    if (isset($loginRequest['inputUserEmailAddress']) && isset($loginRequest['inputUserPsw'])) {
        $userEmailAddress = $loginRequest['inputUserEmailAddress'];
        $userPsw = $loginRequest['inputUserPsw'];

        //tester les donnees di formulaire dans le modele

        require "model/usersManager.php";
        if (isLoginCorrect($userEmailAddress, $userPsw)) {
            getUserType($userEmailAddress);
            $_SESSION['userEmailAddress'] = $userEmailAddress;
            $error = 0;
            require "view/home.php";

        } else {
            $error = 1;
            require "view/login.php";
        }
    } else { //donnes non remplies

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
            require_once "model/usersManager.php";
            $check = checkRegister($userEmailAddress);
            if (!(isset($check[0][0]))) {
                $registerErrorMessage = null;
                //check passwords are same
                if ($userPsw == $userPswRepeat) {
                    $registerPswErrorMessage = null;
                    require_once "model/usersManager.php";
                    if (registerNewAccount($userEmailAddress, $userPsw)) {
                        $_SESSION['userEmailAddress'] = $userEmailAddress;
                        require_once "controler/annonce.php";
                        home();

                    } else {
                        $registerErrorMessage = "our developers don't know the reason of this error";
                        require_once "view/register.php";
                    }
                } else {
                    $registerPswErrorMessage = "passwords are different";
                    require_once "view/register.php";
                }
            } else {
                $registerErrorMessage = "Email already exists";
                require_once "view/register.php";
            }
            require_once "view/home.php";
        }
    } catch (ModelDataBaseException $ex) {
        $registerErrorMessage = "we are dead";
        return "view/lost.php";
    }
}


function modifyUserPassC($request)
{
    $endToken = array();
    if (isset($_SESSION['userEmailAddress']) && isset($request['inputUserPsw']) && isset($request['inputUserPswRepeat'])) {
        if ($request['inputUserPsw'] == $request['inputUserPswRepeat']) {
            $registerPswErrorMessage = null;
            require_once "model/usersManager.php";
            if (modifyUserPassM($_SESSION['userEmailAddress'], $request['inputUserPsw'])) {
                home();
            } else {
                $ChPswErrorMessage = "our developers don't know the reason of this error";
                require_once "view/register.php";
            }
        } else {
            $ChPswErrorMessage = 1;
        }
    } else { //donnes non remplies

        require "view/modifUserInfo.php";
    }
}


function modifyUserEmailC($requestEmail)
{
    if (isset($_SESSION['userEmailAddress']) && isset($request['Email'])) {

        $registerPswErrorMessage = null;
        require_once "model/usersManager.php";
        if (modifyUserEmailM($_SESSION['userEmailAddress'], $requestEmail['Email'])) {
            $_SESSION = $requestEmail['Email'];
            home();
        } else {
            $ChPswErrorMessage = "our developers don't know the reason of this error";
            require_once "view/register.php";
        }
    } else { //donnes non remplies

        require "view/modifUserInfo.php";
    }
}
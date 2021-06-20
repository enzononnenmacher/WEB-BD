<?php /**
 * @file users.php
 * @@brief     This file is the rooter managing the link with controllers.
 * @param $loginRequest
 * @author    Updated by Shanshe Gundishvili
 * @version   10.05.2021
 */

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to log in a client in his account
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
            require "../view/login.php";
        }
    } else { //donnes non remplies

        require $_SERVER['DOCUMENT_ROOT'] . "/view/login.php";
    }
}

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to log user out of his account
 */
function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to register new user/client in database
 */
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

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to modify password of existing user
 */
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

/**
 * @author : Shanshe Gundishvili
 * @date : 20/05/2021
 * @Goal : to modify Email of existing user
 */
function modifyUserEmailC($request)
{
    if (isset($_SESSION['userEmailAddress']) && isset($request['Email'])) {
        require_once "model/usersManager.php";
        $check = checkRegister($userEmailAddress);
        if (!(isset($check[0][0]))) {
            $registerPswErrorMessage = null;
            require_once "model/usersManager.php";
            if (modifyUserEmailM($_SESSION['userEmailAddress'], $request['Email'])) {
                logout();
                require_once "controler/annonce.php";
                home();
            } else {
                $ChPswErrorMessage = "our developers don't know the reason of this error";
                require_once "view/register.php";
            }
        }else {
            $registerErrorMessage = "Email already exists";
            require_once "view/register.php";
        }
    } else { //donnes non remplies

        require "view/modifUserInfo.php";
    }
}
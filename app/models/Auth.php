<?php

declare(strict_types=1);

/**
 * Summary of Auth
 * handle session
 */
class Auth
{
    public static function authentication($row)
    {
        if (is_object($row)) {
            $_SESSION['USER_DATA'] = $row;
        }
    }
    public static function logout()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            unset($_SESSION['USER_DATA']);
            
        }
    }
    public static function logged_in()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            return true;
        }
        return false;
    }
    public static function is_admin()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == "admin") {
                return true;
            }
            return false;
        }
    }
    //create system we can grap any coulumn from data ... i need username just write username
    public static function __callStatic($method, $args){
        //$medod include method name
        //$argus include any args inside method     
        $key = str_replace("get","",strtolower($method));
        if ($_SESSION['USER_DATA']->$key) {
            return $_SESSION['USER_DATA']->$key;
        } else{
            return false;
        }                                        
       // print_r($args) ;
    }
}

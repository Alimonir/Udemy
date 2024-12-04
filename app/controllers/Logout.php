<?php declare(strict_types= 1);
/**
 * Summary of Logout
 * 
 */
require "CheckInterface.php";
class Logout extends Controller implements CheckInterface{
    public function index() {
        Auth::logout();     
        redirectPage('login');

    }
    }
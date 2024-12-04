<?php declare(strict_types= 1);
/**
 * Summary of Home
 * 
 */
require "CheckInterface.php";
class Home extends Controller implements CheckInterface{
    public function index() {
                
       $data['title'] = "Home Page";
        $this->view("home", $data);
    }
    }
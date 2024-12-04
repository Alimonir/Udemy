<?php declare(strict_types= 1);
/**
 * Summary of Home
 * 
 */
require "CheckInterface.php";
class Admin extends Controller implements CheckInterface{
    protected $row;
    public function index() {
        if(!Auth::logged_in()) {
            message("please login to view the page");
            return redirectPage("login");
        };
       $data['title'] = "Admin Page";
        $this->view("admin/dashboard", $data);
    }
    public function profile($id = null) {
        if(!Auth::logged_in()) {
            message("please login to view the page",true);
            return redirectPage("login");
        };

        
        $id = $id ?? Auth::getid();
        //i can use session too
        $user = new UserModel;
        $this->row = $user->firstInData(["id"=> $id]);
        
        //var_dump($this->row);
        //echo"<br>";
        //var_dump($_SESSION); 
        $data["title"] = "Profile";
        $this->view("admin/profile", $data);

    }

    }

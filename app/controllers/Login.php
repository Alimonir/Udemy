<?php

declare(strict_types=1);
require "CheckInterface.php";
/**
 * Summary of Login
 * create first like where function but change will be in query will add "order by id desc limit 1"
 * in login he used user 
 * 
 */
class Login extends Controller implements CheckInterface
{
         protected $row;

    public function index()
    {       
        $data['errors']=[];

        $data['title'] = "Login";
        $user = new UserModel();

        //validate
        //var_dump($_POST);
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $this->row = $user->firstInData(['email' => $_POST['email'],]);
       if($this->row){
        
            if(password_verify($_POST['password'],$this->row->password)){
                //Authentication 
                //static class
                Auth::authentication($this->row);
                
                redirectPage('home');}}
        
            $data['errors']['email'] = "Wrong email or password";
        }
            //var_dump($this->row);
            //stdClass Object ( [id] => 5 [email] => alimonir123@gmail.com [firstname] => aly [lastname] => monir [password] => 123456789 [role] => user [date] => 2024-11-30 )
            //print_r($_SESSION['USER_DATA']);
        $this->view("login", $data);
    }
}

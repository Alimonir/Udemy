<?php

declare(strict_types=1);
require "CheckInterface.php";
class Signup extends Controller implements CheckInterface
{
    public function index()
    {

        $user = new UserModel();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($user->validate($_POST)) {
                $_POST['date'] = date('Y-m-d H:i:s');
                $_POST['role'] = 'user';
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->insert($_POST);

                message('Your email was successfully created');
                redirectPage('login');
            }
        }

        $data['title'] = "signup";
        $data['user'] = $user;
        $this->view("signup", $data);
    }
}

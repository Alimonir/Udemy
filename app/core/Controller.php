<?php declare(strict_types= 1);
/**
 * main controller
 * 
 */
//namespace App\Core;
class Controller{
    public function view($view,$data = []){
        $filePath =  "../app/view/" . $view . ".view.php";
        extract($data);//Import variables into the current symbol table from an array
        try {
        if (file_exists($filePath)) {
            require $filePath;
        }else{
            throw new Exception("View file not found: " . $filePath);
        }
    } catch (Exception $th) {
        echo ($th->getMessage() ." Cannot find view file ");
    }
    }
    
}
<?php
require "CheckInterface.php";
class _404 extends Controller implements CheckInterface{
    function index()  {
        $data['errorNotFound'] = 'page not Found error 404';
        $this->view("_404",$data);
    }
    
}
/**
 * in the future i will add these error to 
 * RewriteEngine On
ErrorDocument 404 /404.html
ErrorDocument 500 /404.html
ErrorDocument 403 /404.html
ErrorDocument 400 /404.html
ErrorDocument 401 /401.html
 */
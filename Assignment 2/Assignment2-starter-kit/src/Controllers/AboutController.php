<?php
//  this was written in class
namespace src\Controllers;

use core\Request;

class AboutController extends Controller {
    public function index( Request $request) {
        //echo "This is the about page!";
        //$this->render('about');
        // no need to do $_GET we will now just use the Request $request in the parameter
        // now e just do
        $name = $request->input('name') ?? '';
        echo 'name' . $name;
        $username = 'Chris';
        $this->render('about', ['username' => $username]);
    }
}

?>
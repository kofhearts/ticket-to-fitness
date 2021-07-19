<?php


class Activity extends Controller{

    public function __construct(){

        

    }

    public function index(){
        $this->allactivity();
    }


    public function allactivity(){

        $this->view('Landing/activities');
    }



}



?>
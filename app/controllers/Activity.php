<?php


class Activity extends Controller{

    public function __construct(){

        $this->activityModel = $this->model('ActivityModel');


    }

    public function index(){
        $this->allactivity();
    }


    public function allactivity(){

        $this->view('Landing/activities');
    }

    //Param from GET Request
    //Param will be type which can be category, credit or frequency
    //Return data, array of rows from database
    //All the database query should be done in ActivityModel.php model
    public function filterby($type, $param){

        //Check if the type is category or credit or frequency
        //if it is category then check what parameter it has like cycling, swimming etc based on that call ActivityModel function to get
        //filtered result


    }

   

}



?>
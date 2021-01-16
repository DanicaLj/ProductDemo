<?php 

class View{

    public $addCommentRoute = 'Controller/Action.php';
    public function getRenderPage($viewName)
    {
        require "frontend/templates/" . $viewName . ".php";
    }
} 
?>
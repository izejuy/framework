<?php

use limeberry\Controller As myController;
use limeberry\core\Resources;

class indexController extends myController{
    
    public function indexAction($param=0)
    {      
        $this->View->Render("start_screen.php");
    }
}

?>

<?php
	
    /***
     *  Limeberry | PHP MVC Framework
     *  a new php mvc framework for fast and secure web applications. 
     *
     * @package Limeberry Framework 
     * @author Sinan SALIH
     * @copyright Copyright (C) 2018 Sinan SALIH
     */



     /*
      * Entry point of application.
      */
    require_once 'limeberry/Framework.php';
    use limeberry\Framework;
	
    Framework::LoadConfig("app_config.php");
        
    Framework::Run();

?>
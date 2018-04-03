<?php

/**
*   Limeberry Framework
*   
*   a php framework for fast web development.
*   
*   @package Limeberry Framework
*   @author Sinan SALIH
*   @copyright Copyright (C) 2018 Sinan SALIH
*   
**/

require_once 'base.php';
    spl_autoload_register("loadframework");
        
    /**
    * Loads core framework modules, libraries, classes.
    * @ignore
    */
    function loadframework($class)
    {
        //namespace to path converter
        $class = ROOT.DS.str_replace("\\", "/", $class).'.php';
        if(file_exists($class))
        {
            require_once($class);
        }
    }
?>
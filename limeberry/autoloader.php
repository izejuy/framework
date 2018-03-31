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
    spl_autoload_register("loadcontroller");
        
        
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
        
    /**
    * This function loads all files in controllers directory when needed.
    * @ignore
    */
    function loadcontroller($class)
    {
        global $application_folder;
        $fileName = $application_folder.DS.'controller'.DS.$class.'.php';
        if(file_exists($fileName))
        {
            require_once $fileName;
        }
    }
?>
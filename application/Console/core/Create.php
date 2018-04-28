<?php

/**
 *	Limeberry Framework
 *
 *	a php framework for fast web development.
 *
 *	@package Limeberry Framework
 *	@author Sinan SALIH
 *	@copyright Copyright (C) 2018 Sinan SALIH
 *
 **/


define("INSTANCES", dirname(__FILE__). DIRECTORY_SEPARATOR. "instance".DIRECTORY_SEPARATOR);

class Create
{
    
    /**
     * This method creates a new controller for your application.
     * @param string $path Controller path for limeberry app
     * @param string $fname New Controller file name for limeberry app
     */
    public static function Controller($path, $fname)
    {
        try{
            $ins = file_get_contents(INSTANCES."controller.instance");
            
            $ins = str_replace("@rn", $fname."Controller", $ins);
            file_put_contents($path. $fname."Controller.php", $ins);
            
            echo "\n [+] Your new controller called {$fname}Controller.php created in controller path\n\n";
            
        }catch (Exception $e)
        {
            echo "\n [!] Error while creating new item in project. Error message: \n{$e->getMessage()}";
        }
    }
    
    /**
     * This method creates a new model for your application.
     * @param string $path Controller path for limeberry app
     * @param string $fname New Controller file name for limeberry app
     */
    public static function Model($path, $fname)
    {
        try{
            $ins = file_get_contents(INSTANCES."model.instance");
            
            $ins = str_replace("@rn", $fname."Model", $ins);
            file_put_contents($path. $fname."Model.php", $ins);
            
            echo "\n [+] Your new model called {$fname}Model.php created in model path\n\n";
            
        }catch (Exception $e)
        {
            echo "\n [!] Error while creating new item in project. Error message: \n{$e->getMessage()}";
        }
    }
  
}
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
    
    public static function Controller($path, $fname)
    {
        try{
            $ins = file_get_contents(INSTANCES."controller.instance");
            
            $ins = str_replace("@rn", $fname."Controller", $ins);
            file_put_contents($path. $fname."Controller.php", $ins);
            
            echo "\n [+] Your new controller called {$fname}Controller.php created in controller path\n\n";
            
        }catch (Exception $e)
        {
            echo "\n [!] Error while creating new item in project.Error message: \n{$e->getMessage()}";
        }
    }
  
}
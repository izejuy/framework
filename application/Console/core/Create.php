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
     * @param string $path path for limeberry app
     * @param string $fname New Controller file name for limeberry app
     */
    public static function Controller($path, $fname)
    {
        try{
            $ins = file_get_contents(INSTANCES."controller.instance");
            $ins = str_replace("@rn", $fname."Controller", $ins);
            if(!(empty($fname)))
            {
                if (strpos($fname, ':') !== false) {
                    $fname = explode(':', $fname);
                    
                    file_put_contents($path.$fname[0].'Area'.DIRECTORY_SEPARATOR. $fname[1]."Controller.php", $ins);
                    echo "\n [+] Your new controller called {$fname[1]}Controller.php created in controllers and {$fname[0]}Area path\n\n";
                }else{
                    file_put_contents($path. $fname."Controller.php", $ins);
                    echo "\n [+] Your new controller called {$fname}Controller.php created in controller path\n\n";
                }
            }
            
        }catch (Exception $e)
        {
            echo "\n [!] Error while creating new item in project. Error message: \n{$e->getMessage()}";
        }
    }
    
    
    /**
     * This method creates a new model for your application.
     * @param string $path path for limeberry app
     * @param string $fname New model file name for limeberry app
     */
    public static function Model($path, $fname)
    {
        try{
            $ins = file_get_contents(INSTANCES."model.instance");
            
            $ins = str_replace("@rn", $fname."Model", $ins);
            
            if(!(empty($fname)))
            {
                file_put_contents($path. $fname."Model.php", $ins);
                echo "\n [+] Your new model called {$fname}Model.php created in model path\n\n";
            }
            
        }catch (Exception $e)
        {
            echo "\n [!] Error while creating new item in project. Error message: \n{$e->getMessage()}";
        }
    }
  
    
    /**
     * This method creates a new area for your controllers.
     * @param string $path path for limeberry app
     * @param string $fname New Controller file name for limeberry app
     */
    public static function Area($path, $fname)
    {
        if (!file_exists($path.$fname.'Area')) {
            mkdir($path.$fname.'Area', 0777, true);
            echo "\n [+] Your new area called {$fname} created in controllers\n\n";
        }else{
            echo "\n [!] Area {$fname}Area already exists in controllers\n\n";
        }
    }
    
    
    
    /**
     * This method creates a new template for your application.
     * @param string $path path for limeberry app
     * @param string $fname New file name
     */
    public static function Template($path, $fname)
    {
        try{
            $ins = file_get_contents(INSTANCES."template.instance");   
            if(!(empty($fname)))
            {
                file_put_contents($path. $fname.".php", $ins);
                echo "\n [+] Your new master page called {$fname}.php created in template path\n\n";
            }
            
        }catch (Exception $e)
        {
            echo "\n [!] Error while creating new item in project. Error message: \n{$e->getMessage()}";
        }
    }
    
}
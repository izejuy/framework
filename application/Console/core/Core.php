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


class Core
{
    /**
     * This method is used to clear commands get from cli.
     * @param string $args Command line argument
     * @return string
     */
    public static function clearArg(&$args)
    {
        return strtolower($args);
    }
    
    
    /**
     * This method is used to check if arguement is set
     * @param string $args Command line argument
     * @return string
     */
    public static function checkArg(&$args)
    {
        if(isset($args))
        {
            return self::clearArg($args);
        }else{
            echo "\n [!] Please set a name for your component after create command.\n";
        }
    }
    
}

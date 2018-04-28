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


/**
 * Core code files of limeberry console.
 * @var string $core
 */
$core = 'core'; 
require_once $core.DIRECTORY_SEPARATOR.'Core.php';

/**
 * Define constants for limeberry console
 */
define("DS", DIRECTORY_SEPARATOR);
define("APP", dirname(dirname(__FILE__)));



switch (Core::ClearArg($argv[1])){
    case "create:controller" :
        {
            require_once $core.DS.'Create.php';
            Create::Controller(APP.DS."controller".DS ,$argv[2]);
            break;
        }
    default:
        echo "Limeberry PHP Framework \n\n [!] Command not found. Please run 'get:help' for help.\n\n";
        break;
}



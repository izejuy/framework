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

/** 
 * PSR-4 Auto-loading.
 * @link <https://www.php-fig.org/psr/psr-4/>.
 */
spl_autoload_register(function ($class) {

    // Project namespaces to match.
    $prefixes = array(
        "limeberry\\dataman\\",
        "limeberry\\forms\\",
        "limeberry\\helpers\\",
        "limeberry\\io\\",
        "limeberry\\security\\",
        "limeberry\\tool\\",
        "limeberry\\visual\\"
    );

    // Base directory for the namespace prefix.
    $baseDir = ROOT . DS;
    
    foreach ($prefixes as $prefix) {
        // Does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }
    
        // Fetch the relative class name.
        $relativeClass = substr($class, $len);
    
        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    
        // If the file exists, require it.
        if (file_exists($file)) {
            require $file;
        }
    }

    $file = $baseDir . str_replace("\\", "/", $class) . '.php';

    // If the file exists, require it.
    if (file_exists($file)) {
        require $file;
    }
});
?>

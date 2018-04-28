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
    public static function ClearArg(&$args)
    {
        return strtolower($args);
    }
}

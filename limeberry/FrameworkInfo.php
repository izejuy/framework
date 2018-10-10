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
namespace limeberry
{
    /**
     * FrameworkInfo class contains information and version data of the framework. 
     */
    class FrameworkInfo{
        
        /**
         * Returns version number of Limeberry PHP
         */
        public static function VersionNumber(){
            return "1.2.1@dev";
        }
        
        /**
         * Last configuration on core framework files of the Limeberry
         */
        public static function LastUpdate(){
            return "11.10.2018";
        }
    }
    
}
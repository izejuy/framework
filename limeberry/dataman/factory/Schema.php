<?php

/**
*	Limeberry Framework
*	
*	a php framework for fast web development.
*	
*	@package Limeberry Framework
*	@author Sinan SALIH
*	@copyright Copyright (C) 2018-2019 Sinan SALIH
*	
**/

namespace limeberry\dataman\factory
{
    class Schema{
        private $version;
        private $database_name;
        private $table_generation;
    
        public function __construct($database_name="default"){
            $this->database_name =   $database_name;
        }
    
        public function Name($database_name="default"){
            $this->database_name = $database_name;
            return $this;
        }
        public function Version($database_version = 1){
            $this->version = $database_version;
            return $this;
        }
    
        public function Tables(){
            if(func_num_args() > 0){
                foreach(func_get_args() as $tables){
                    $this->table_generation .= $tables;
                }
            }
            return $this;
        }
    
        public function __toString()
        {
            return $this->table_generation;
        }    
    }
}
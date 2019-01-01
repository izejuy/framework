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
     /**
     * [TESTS]
     */
    class Schema{

        private $database_name;
        private $generated_sql;
        private $database_version;


        public function __construct($xml_schema_file = "1.xml"){
            $mig = simplexml_load_file($xml_schema_file);
            $tables = $mig->table;
            $str_generated="";

            //get database name and create
            $this->database_name = $mig->attributes()->name;
            $this->database_version = $mig->attributes()->version;


            $str_generated.="CREATE DATABASE IF NOT EXISTS ".$mig->attributes()->name.";";
            $str_generated.="\r\n";
            $str_generated.="USE ".$mig->attributes()->name.";";
            $str_generated.="\r\n";

            //proccess tables
            foreach($tables as $table){
                $str_generated.="CREATE TABLE IF NOT EXISTS ".$table->attributes()->name."( \r\n";
                foreach($table->column as $columns){
                    $str_generated.= $columns." ";
                    foreach($columns->attributes() as $atrr){
                        $str_generated.= $atrr.",";
                    }
                    
                }

                $str_generated = rtrim($str_generated, ",");
                $str_generated.="); \r\n";
            }
            $this->generated_sql = $str_generated;
            return $this;
        }

        public function __tostring(){
            return $this->generated_sql;
        }

        public function Name(){
            return $this->database_name;
        }

        public function VersionCode(){
            return $this->database_version;
        }

        public function Generated(){
            return $this->generated_sql;
        }

    }

}
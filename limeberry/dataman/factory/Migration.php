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
    use limeberry\dataman\DbCommand;
    /**
     * [TESTS]
     */
    class Migration{
        public static function Up($schema, $db_instance){
            try{
                $m_cmd = new DbCommand((String)$schema, $db_instance->Source());
                $m_cmd->Execute();
                return true;
            }catch(Exception $e){
                return false;
            }
        }


        public static function Down(){
        }

        public static function Synch(){
        }

    } 
}
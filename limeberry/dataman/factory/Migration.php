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
    use limeberry\dataman\DbConnect;

    /**
     * Migration class is used to manage the create 
     * and drop database operations of your project.
     */
    class Migration{

        /**
         * Create a database from the given schema
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         * @return bool
         */
        public static function Up($schema, $db_instance){
            if($schema->VersionCode() <= 1){
                /**
                 * Version Code is 1 or less than 1(means: Not Available)
                 * Create schema in server without checking.
                 */
                try{
                    $m_cmd = new DbCommand((String)$schema, $db_instance->Source());
                    $m_cmd->Execute();
                    $m_cmd->CloseCommand();
                    self::addToBackStack(1, $db_instance);
                    return true;
                }catch(Exception $e){
                    return false;
                }
            }else{
                /**
                 * version code is greater than 1 so update the
                 * server's database set. if source schema version is greater than server's version
                 */
                if($schema->VersionCode() > self::CurrentVersion($db_instance)){
                    try{
                        $m_cmd = new DbCommand((String)$schema, $db_instance->Source());
                        $m_cmd->Execute();
                        $m_cmd->CloseCommand();
                        self::addToBackStack($schema->VersionCode(), $db_instance);
                        return true;
                    }catch(Exception $e){
                        return false;
                    }
                }else{
                    //Good Luck with your project.
                    //No need to update database.
                }
            }
        }


        /**
         * Drop a database from the given schema.
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         * @return bool
         */
        public static function Down($schema, $db_instance){
        }

        /**
         * Keep your database continuously updated independent 
         * from version number. Not recommended in production. 
         * @param $schema An instance of Schema class
         * @param $db_instance An instance of your database connection
         * @return bool
         */
        public static function Synch($schema, $db_instance){
        }



        public static function CurrentVersion($db_instance){
            try{
                $check = new DbCommand("select version from autopulse where id=(SELECT max(id) from autopulse);", $db_instance->Source());
                $checked = $check->Fetch();
                return $checked["version"];
            }catch(Exeption $e){
                return -1;
            }
        }


        private static function addToBackStack($version_code, $db_instance){
    
            try{
                if(self::CurrentVersion($db_instance) != $version_code){
                    $cmd = new DbCommand("insert into autopulse(version) values(:code);", $db_instance->Source());
                    $cmd->SetParameter(':code', $version_code);
                    $cmd->Execute();
                }
            }catch(Exceoption $e){
                return -1;
            }
        }

    } 
}
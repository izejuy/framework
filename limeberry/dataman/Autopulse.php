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
namespace limeberry\dataman
{
    use limeberry\dataman\DbCommand;

    /**
     * With this library you can easily access and manage your database. 
     * This class, which contains functions that make it easier to process your data. 
     * AutoPulse will save you writing complex dml queries. 
     * The only think you need is to call required function.
     */
    class Autopulse
    {
        /**
        *	This function is used to load a model class directly to your
        *       database. 
        *	@param Mixed $modelForm Model Class variable
        * 	@param Mixed $dbclassinstance Source provided by MysqlConnect class
        *	@return bool
        */
        public static function LoadModel(&$modelForm, $dbclassinstance)
        {
            try 
            {
                //create command
                $cmdTable = get_class($modelForm);
                $command = 'insert into '.$cmdTable.'(';
                foreach ($modelForm as $key => $value) {
                        $command .= $key.',';
                }
                $command = rtrim($command, ',') .') values (';
                foreach ($modelForm as $key => $value) {
                        $command .= ' :'.$key.' ,';
                }
                $command = rtrim($command, ',').');';
                #define database
                $m_cmd = new DbCommand($command, $dbclassinstance);

                foreach ($modelForm as $key => $value) {
                        $m_cmd->SetParameter(':'.$key, $value);
                }
                #load
                $m_cmd->Execute();
                return true;
            } catch (Exception $e) {
                    return false;
            }
        }

        /**
        *	This function is used to load an array to your database.
        *	@param String $tableName Database table name
        *	@param Array $fieldList Array id as column name and value as data to insert. ex: array("user_id"=>12975)
        * 	@param Mixed $dbclassinstance Source provided by MysqlConnect class
        *	@return bool
        */
        public static function LoadArray($tableName='', array $fieldList, $dbclassinstance)
        {
                try 
                {
                    //create command
                    $command = 'insert into '.$tableName.'(';
                    foreach ($fieldList as $key => $value) {
                            $command .= $key.',';
                    }
                    $command = rtrim($command, ',') .') values (';
                    foreach ($fieldList as $key => $value) {
                            $command .= ' :'.$key.' ,';
                    }
                    $command = rtrim($command, ',').');';
                    #define database
                    $m_cmd = new DbCommand($command, $dbclassinstance);
                    #define query in database

                    #bind values
                    foreach ($fieldList as $key => $value) {
                            $m_cmd->SetParameter(':'.$key, $value);
                    }
                    #load
                    $m_cmd->Execute();
                    return true;
                } catch (Exception $e) 
                {
                        return false;
                }
        }

        /**
        *	Update a data using model form and array
        *	@param Mixed $modelForm Model Class variable
        *	@param Array $fieldList Fields to be updated, array key as sql table column name and value as data to be updated.
        *	@param String $whereOption Set where options to sql query. ex: "id > 5"
        * 	@param Mixed $dbclassinstance Source provided by MysqlConnect class
        *	@return bool
        */
        public static function Update(&$modelForm, $fieldList=null, $whereOption=null , $dbclassinstance)
        {
            try
            {
                    //get table name from model
                    $table = get_class($modelForm);
                    //command builder;
                    $command='update '.$table.' set ';
                    if($fieldList != null)
                    {
                            foreach ($modelForm as $key => $value) {
                                    if(in_array($key, $fieldList))
                                    {
                                            $command .= ' '.$key.'=:'.$key.',';
                                    }
                            }
                    }else{
                            foreach ($modelForm as $key => $value) {
                                    $command .= ' '.$key.'=:'.$key.',';
                            }
                    }
                    $command = rtrim($command, ',');
                    if($whereOption !=null)
                    {
                            $command.= ' where '.$whereOption.' ';
                    }

            //parameter binder;
            #define database
            $m_cmd = new DbCommand($command, $dbclassinstance);
            #define query in database
            if($fieldList !=null)
            {
                    foreach ($modelForm as $key => $value) {
                            if(in_array($key, $fieldList))
                            {
                                    $m_cmd->SetParameter(':'.$key, $value);
                            }
                    }
            }
            else{
                    foreach ($modelForm as $key => $value) {
                            $m_cmd->SetParameter(':'.$key, $value);
                    }
                    return true;
            }
            $m_cmd->Execute();
            }catch(Exception $ex)
            {
                    return $ex->getMessage();
                    return false;
            }
        }

        /**
        *	Delete data from database
        *	@param Mixed $modelForm Model Class
        *	@param String $whereOption Set where options to sql query. ex: "id > 5"
        *       @param Mixed $dbclassinstance Source provided by MysqlConnect class
        *	@return bool
        */
        public static function Delete(&$modelForm, $whereOption=null, $dbclassinstance)
        {
            try
            {
                    //get table name from model
                    $table = get_class($modelForm);
                    //command builder;
                    $command='delete from '.$table.' ';
                    if($whereOption !=null )
                    {
                            $command.='where '.$whereOption;
                    }
                    //parameter binder;
                    #define database
                    $m_cmd = new DbCommand($command, $dbclassinstance);
                    $m_cmd->Execute();
                    return true;
            }catch(Exception $ex){
                    return $ex->getMessage();
                    return false;
            }
        }
    }
}

?>
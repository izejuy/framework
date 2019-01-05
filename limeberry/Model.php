<?php
/**
 * Limeberry Framework.
 *
 * A php framework for fast web development.
 *
 * @author Sinan SALIH
 * @copyright Copyright (C) 2018-2019 Sinan SALIH
 */

namespace limeberry;

use function file_exists;

/**
 * This class is used to operate with models.
 */
class Model
{
    /**
     * This function is used to load a model to other code files.
     *
     * @param string $class model file name in 'model' directory.
     *
     * @return void Returns nothing.
     */
    public static function Load($class = '')
    {
        $fileName = Configuration::getApplicationFolder().DS.'model'.DS.$class.'.php';
        if (file_exists($fileName)) {
            require_once $fileName;
        }
    }


    /**
     * This function is used to convert the instance of your model
     * from object array to string array for using with 'Autopulse'
     * library.
     * @return array
     */
    public  function toArray()
    {
        $array_generated;
        if(count(get_object_vars($this)) > 0){
            foreach(get_object_vars($this) as $key=>$value){
                $array_generated[$key] = $value;
            }
        }else{
            $array_generated = array();
        }
        return $array_generated;
    }
}

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
namespace limeberry\forms
{
    use limeberry\forms\FormElements;
    use limeberry\io\SpecialDirectory as SpecialDirs;
    use limeberry\Model;
    
    Class Form
    {   
        const EOL = "\n"; 

        protected $baseForm;
        protected $formElements;
        protected $modelInstance;
        protected $formName;
                
        function __construct($formName = "defaultForm") 
        {
            $this->baseForm = "";   
            $this->formElements = "";   
            $this->modelInstance = "";   
            $this->formName = $formName;
        }

        public function DefineForm($attr=null)
        {
            
            $creator = "";
            $formName =  $this->formName;
            if(is_null($attr))
            {
               $creator .= '<form name="'.$formName.'" action="'. \limeberry\url::GetUrl().'" >'.self::EOL;
               
            }else{
                $creator = '<form name="'.$formName.'" action="'. \limeberry\url::GetUrl().'" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' '.$key.'="'.$value.'"';
                }
                $creator .=">". self::EOL;
            }
            return $creator;
        }
        
        public function setModel($modelClass)
        {
            if(!is_null($modelClass))
            {
                $this->modelInstance = $modelClass;
            }
        }
        
        public function setElement($element)
        {
            $creator = "";
            $creator.= $element.self::EOL;
            return $creator;
        }

        public function FinishForm()
        {
            $creator = "</form>".self::EOL;       
             return $creator;
        }
        
        public function Call($actionName)
        {
            if($this->__desidePostedForm($this->formName))
            {
                    Model::Load($this->modelInstance);
                    $modelClass = new $this->modelInstance;
                    if(method_exists($modelClass, $actionName))
                    {
                        $paramsPosted = $_POST;
                        foreach ($paramsPosted as $key => $value) {
                            if(property_exists($this->modelInstance, $key))
                            {
                                $modelClass->$key = $_POST[$key];
                            }
                        }
                        $modelClass->{$actionName}();
		    }
            }
            
        }
        private function __desidePostedForm($frmName="")
        {
            if(isset($_POST[$frmName]))
            {
                return true;
            }
        }
  
    }
}
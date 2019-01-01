<?php


use limeberry\Controller;
use limeberry\dataman\factory\Migration;
use limeberry\dataman\factory\Schema;


use limeberry\io\SpecialDirectory as sd;
use limeberry\dataman\MySqlConnect;
use limeberry\dataman\MySqlCommand;

/**
* [TESTS]
*/
class testController extends Controller{

    public function indexAction(){
        //A simple call for migration
        //for test purpose only.
        //Main migration job must not proceed in controllers

        Migration::Up(new Schema(
            sd::ApplicationFolder().DS."TEST_migration1.0.xml"
        ), new MySqlConnect(
            "localhost", "root", ""
        ));
    }

}
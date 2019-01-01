<?php


use limeberry\Controller;
use limeberry\dataman\factory\Schema;
use limeberry\dataman\factory\Table;
use limeberry\dataman\factory\Column;



/**
* [TESTS]
*/
class testController extends Controller{

    public function indexAction(){
        //A simple call for migration
        //for test purpose only.
        //Main migration job must not proceed in controllers

        
        $schema = new Schema();
        echo $schema->Name("test_db")
                ->Version(1)
                ->Tables(
                    new Table("users",
                        new Column("userid","int","not null"),
                        new Column("password","varchar(250)","not null")),
                    
                    
                    new Table("books",
                        new Column("bookid", "int", "not null"),
                        new Column("userid", "int", "not null")
                    ));

    }

}
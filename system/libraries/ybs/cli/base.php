<?php
namespace ybs\cli;

use ybs\cli\err_handle;
use ybs\cli\listener;
use ybs\cli\mvc;
use ybs\cli\migrate;
use ybs\cli\model;
use ybs\cli\seeder;
use ybs\cli\support\Blueprint;
use ybs\cli\support\ColumnDefenition;
use ybs\cli\support\Schema;

if (!defined('cli'))
    exit('No direct script access allowed');

require_once "err_handle.php";
require_once "listener.php";
require_once "generator.php";
require_once "migrate.php";
require_once "seeder.php";
require_once "model.php";
require_once "support/Blueprint.php";
require_once "support/ColumnDefenition.php";
require_once "support/Schema.php";


require_once BASEPATH . "helpers/directory_helper.php";




class base extends err_handle {

public $listener;
public $generator;


public function __construct(){
	$this->listener = new listener();
	$this->generator  = new generator();
	$this->migrate = new migrate();
	$this->seeder = new seeder();
}



	


	
public function show_command(){
$this->show_logo();	
echo "
  COMMAND:                    Descriptions
----------------------------------------------------------------------

make:help                          list command in make
make:[-c] [name]                   create file controller
make:[contoller] [name]            create file controller
make:[-m] [name]                   create file model
make:[model] [name]                create file model
make:[-v] [name]                   create file view
make:[view] [name]                 create file view
make:[-c-m-v] [name] 	           create file controller-view-model
									 
									 
                                   migration only table structure	
make:migration [name]              create empty file migration 									 
make:migration [name] --all        create file migration all table
make:migration [name] --c--[table_name]   create file migration (schema create)

									 
									 
									 
                                   seed data from table						 
make:seed [name] --all             create file seed all table
make:seed [name] --[table_name]    create file seed one table

  
  
migrate:help                       list command migrate
migrate                            install all file migrate
migrate:rollback                   rollback all migrate
migrate:rollback --step=[value]    rollback step  

seed:help                          list command seed
seed                               install all seed
seed:[filename]                    install the file seed 
 
----------------------------------------------------------------------

----------------------------------------------------------------------
";		
}

public function show_command_make(){
$this->show_logo();	
echo "
  COMMAND:                      Descriptions
----------------------------------------------------------------------
  
make:help                          list command in make
make:[-c] [name]                   create file controller
make:[contoller] [name]            create file controller
make:[-m] [name]                   create file model
make:[model] [name]                create file model
make:[-v] [name]                   create file view
make:[view] [name]                 create file view
make:[-c-m-v] [name] 	           create file controller-view-model
									 
									 
                                   migration only table structure	
make:migration [name]              create empty file migration 									 
make:migration [name] --all        create file migration all table
make:migration [name] --c--[table_name]  create file migration (schema create)

									 
									 
									 
                                   seed data from table						 
make:seed [name] --all             create file seed all table
make:seed [name] --[table_name]    create file seed one table
 
----------------------------------------------------------------------
-c : controller, -m : model , -v : view , name : path file 
----------------------------------------------------------------------

";		
}


public function show_command_migrate(){
$this->show_logo();	
echo "
  COMMAND:                             Descriptions
----------------------------------------------------------------------
  
migrate:help                       list command migrate
migrate                            install all file migrate
migrate:rollback                   rollback all migrate
migrate:rollback --step=[value]    rollback step  
----------------------------------------------------------------------
--c : schema create, --u : schema update , --all : generate all table ,
name : file name ,  table : table generate , value : step rollback 
----------------------------------------------------------------------\n";
	
}


public function show_command_seed(){
	
$this->show_logo();	
echo "
  COMMAND:                             Descriptions
----------------------------------------------------------------------
  
seed:help                          list command seed
seed                               install all seed
seed:[filename]                    install the file seed 
----------------------------------------------------------------------

----------------------------------------------------------------------\n";	
	
	
	
}


private function show_logo(){
echo "
#######################################################################
 __   __ ____  ____    ____               _                   	
 \ \ / /| __ )/ ___|  / ___|  _   _  ___ | |_  ___  _ __ ___  	
  \ V / |  _ \\___ \  \___ \ | | | |/ __|| __|/ _ \| '_ ` _ \ 	
   | |  | |_) |___) |  ___) || |_| |\__ \| |_|  __/| | | | | |	
   |_|  |____/|____/  |____/  \__, ||___/ \__|\___||_| |_| |_|
                              |___/         					
#######################################################################";
}	




	
}	
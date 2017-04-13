<?php 
/**
 * 
 */
//  include_once('../models/class_module.php');
namespace Controllers;

use Models\ClassModule;
use Includes\DB\DB;
use Includes\Flash\Flash;


class ModuleController 
{
    public $data;
    
    function __construct()
    {
        # code...
    }

    public function sum()
    {
        $flash =  new Flash();
        $flash->add('w','warning');
        return $this->data['a'] +  $this->data['b'];
    }
}

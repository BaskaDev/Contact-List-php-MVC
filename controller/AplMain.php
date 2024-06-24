<?php
/* controller/AplMain.php
this require once search the class in the package projects
*/
require_once 'Controller.php'; 
/*
This class will be to a start button this aplication
 */
class AplMain {
   /*
  This is a aplication construct for this aplmain , this init main class and he call the Controller
 */
    public function __construct() {
        $controller = new Controller();
    }
    
}

/* Do you have a create a instance to this main class 
*/
$application = new AplMain();
<?php 
/*
This class is the all inputs and outputs for the user
*/ 
class View {
    
    public function __construct(){
        
    }

    /*
    This method will be read all user information
    */
    public function leer_data(){
        return $data =trim(fgets(STDIN));

    }
    /*
    This method will be show info to the user
    */
    public function imprimir_data($data){
         echo $data;

    }
  

}
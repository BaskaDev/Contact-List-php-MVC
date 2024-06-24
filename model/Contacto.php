<?php 

class Contacto {
    /*
    This class will be to the model objecto to conctacto 
    */
    private  $name;
    private $phone;
    private $email;

    /*
    This method is the construct for this class , this method is the most important 
    and the first in execute in the creation for a new object type contacto
    */
    public function __construct($name,$phone,$email) {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    /*
    There are all getters and setters
    */
    public function getName(){
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }


    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    /*
    This method will be the return info to the user
    @return string withe the all contact information
    */

    public function __toString() {
        return "| Nombre: " . $this->name . "           \n| Telefono: " . $this->phone . "\n| Email: " . $this->email . "\n";
    }
}
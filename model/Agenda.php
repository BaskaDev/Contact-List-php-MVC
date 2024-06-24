<?php
require_once 'Contacto.php';

/*
This class will be the class with the logic bussines and CRUD operations 
*/
class Agenda {
    /*
    This array will have all contacts data.
    */
    private $contacts = [];
    private $contacto;


      /*
    This method allow add the new conctact
    @param $cotact this is a object type contact
    */

    public function addContact($contact){
       
        if(!$this-> exist_contact($contact -> getName())){
           $this->contacts[] = $contact;
           echo $contact . " fue agregado con exito! \n";
        }else{
           echo "Este contaco ya existe.";
        }
   
       }

   /*
    This method allow delete the new contact
    @param $contact_delete this is a string with the name 
    the contact will be delete
    @return boolean with true or false to show operation status
    */
       public function deleteContact($contact_delete) {
        foreach($this->contacts as $index => $contact) {
            if ($contact->getName() == $contact_delete) {
                unset($this->contacts[$index]);
                $this->contacts = array_values($this->contacts);
                return true;
            }
        }
        return false;
    }
   /*
    This method allow update the new contact
    @param $contact this is a objetct type contact
    @param $update_contacto this is abject type contact ,
    with the new information contact , will be use to replace
    old information
    */
    public function updateContact($contact , $update_contacto){
        $contact -> setName($update_contacto -> getName());
        $contact -> setEmail($update_contacto -> getEmail());
        $contact -> setPhone( $update_contacto -> getPhone());
    }

/*
    This method allow delete the new contact
    @param $contact_delete this is a string with the name 
    the contact will be delete
    @return contact object because this will be used for other method
    */
    public function searchContact($contact_name){
        $this -> contacto=null;
        foreach($this->contacts as $contact){
            if($contact -> getName() == $contact_name){
               $this -> contacto = $contact;
            }else{
               $this -> contacto =  null;
            }
        }
        return $this -> contacto;

    }

/*
    This method search any contat to return if the contact already exist
    @param $name_contact this is a string with the name 
    the contact will be used to search in the array
     @return boolean with true or false to show operation status
    */
    
       public function exist_contact($name_contact){
        foreach ($this->contacts as $save_contact) {
                if( $save_contact-> getName()  ==  $name_contact ){ 
                    return true;
        }else{
            return false;
        }
    }
}
       
    /*
    This method allow access this array
    */

    public function getContacts() {
        return $this->contacts;
    }

    /*
    This method allow update this array
    */

    public function setContacts($contacts){
        $this->contacts = $contacts;
    }
}
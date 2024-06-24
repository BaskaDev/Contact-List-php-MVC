<?php
/* controller/Controller.php
there are a require once they will call all classes the other packages beceause 
this controller going to work with these
*/
require_once __DIR__ . '/../view/View.php';
require_once __DIR__ .'/../model/Contacto.php';
require_once __DIR__ .'/../model/Agenda.php';
class Controller {

    /*
    First we are going to name all variables used in this controller 
    */
    private $vista_consola;
    private $name_contact;
    private $email_contact;
    private $phone_contact;
    private $contacto;
    private $agenda;

    /*
    This is a construct class is a most important method because 
    this instence to all classe used in this controller
    */

    public function __construct() { 
       $this->vista_consola = new View();
       $this->agenda = new Agenda();
       $this->mostrar_menu();
    }

    /*
    This method show menu options to the user 
    */
    public function mostrar_menu(){
        do{
            $menu = "\n|--------------------------|\n|   Agenda Telefonica v0.1 |\n|--------------------------|\n".
            "| 1.Ver contactos          |\n".
            "| 2.Agregar contacto       |\n". 
            "| 3.Actualizar contacto    |\n". 
            "| 4.Eliminar contacto      |\n".
            "| 5.Para salir             |\n".
            "|--------------------------|\n".
            "|Por favor digite una      |\n|opcion:                   | \n";

    $this -> vista_consola->imprimir_data($menu);
    $option =  $this ->vista_consola->leer_data();
    $this ->vista_consola -> imprimir_data("Ingreso la opcion  $option \n");
     
        switch($option){
            case 1:
                $this-> verContactos();
                break;
            case 2:
                $this-> agregarContactos();
                break;
            case 3:
                $this-> actualizarContacto();
                break;
            case 4:
                $this->borrarContacto();
                break;
        }
    
    }while($option < 5);
    $this -> vista_consola ->imprimir_data("\n Saliendo del programa.");
    }
     /*
    This method will be to update contacts , this method will call
     to class agenda because agenda have all bussines logic 
    */

    public function actualizarContacto(){
        $menu = "|--------------------------|\n|   Agenda Telefonica v0.1 |\n|--------------------------|\n| Actualizar Contactos:     |\n";
        $this->vista_consola->imprimir_data($menu);
        $this-> verContactos();
        $this-> vista_consola ->imprimir_data("Ingrese el nombre del contacto a actualizar: ");
        $this ->name_contact = $this-> vista_consola ->leer_data();
        $this -> contacto =$this-> agenda -> searchContact($this-> name_contact);
        if($this -> contacto != null){
            $this ->agenda-> updateContact($this -> contacto , $this -> pedirDatos());
            $this -> vista_consola -> imprimir_data("Se actualizo correctamente el contacto.");
        }else{
            $this -> vista_consola -> imprimir_data("No se encontro ese contacto.");
        }
        
    }

     /*
    This method will be delete a any contact , 
    this method will call to agenda , 
    there is the logic to delete contact
    */

    public function borrarContacto(){
        $menu = "|--------------------------|\n|   Agenda Telefonica v0.1 |\n|--------------------------|\n| Eliminar Contacto:     |\n";
        $this->vista_consola->imprimir_data($menu);
        $this->verContactos();
        $this->vista_consola -> imprimir_data("Ingrese el nombre del contacto que desea eliminar:");
        $this -> name_contact = $this->vista_consola -> leer_data();
        if($this->agenda -> deleteContact($this-> name_contact)){
            $this -> vista_consola -> imprimir_data("Se ha eliminado el contacto ". $this-> name_contact );
        }else{
            $this -> vista_consola -> imprimir_data("No se pudo eliminar a ". $this-> name_contact );
        }
    }
   /*
    This method will call to agenda the
     method with logic to list contacts
    */

    public function verContactos() {
        $menu = "|--------------------------|\n|   Agenda Telefonica v0.1 |\n|--------------------------|\n| Contactos:               |\n";
        $this->vista_consola->imprimir_data($menu);
        $contacts = $this->agenda->getContacts();
        if(empty($contacts)) {
            $this->vista_consola->imprimir_data("| La lista se encuentra    |\n| vacia.                   |");
        } else {
            foreach ($contacts as $contacto) {
                $this->vista_consola->imprimir_data("$contacto\n");
            }
        }
    }

    /*
    This method allows the create new contact
    */

    public function agregarContactos(){
        $menu = "|--------------------------|\n|   Agenda Telefonica v0.1 |\n|--------------------------|\n". "|   Agregar contacto       | \n|--------------------------|\n";
        $this -> vista_consola->imprimir_data($menu);
        $this-> agenda -> addContact($this->pedirDatos()); 
    }

    /*
    This method is how a form because, 
    this allow the send data by user to the application
    */

    public function pedirDatos(){
        $this-> vista_consola-> imprimir_data("| Por favor ingrese el     |\n| nombre del contacto:     |\n");
        $this-> name_contact = $this -> vista_consola ->leer_data();
        $this-> vista_consola-> imprimir_data("| Por favor ingrese el     |\n| email del contacto:      |\n");
        $this-> email_contact = $this -> vista_consola ->leer_data();
        $this-> vista_consola-> imprimir_data("| Por favor ingrese el     |\n| telefono del contacto:   |\n");
        $this-> phone_contact = $this -> vista_consola ->leer_data();
        return $this-> contacto = new Contacto(  $this-> name_contact, $this-> phone_contact,$this-> email_contact  );
    }
    
}

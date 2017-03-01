<?php
/**
 * Descripcion de Data
 * Clase que permite la conexión con la base de datos
 * @author Michael Meléndez Mesén
 */
class Data {  
    
    
    /* atributos */
    public $server;
    public $user;
    public $password;
    public $db;  
    
    /* constructor */
    public function Data(){        
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "admin123";
        //$this->password = "admin123";
        $this->db = "mgasoluciones";
    }
    
}
?>

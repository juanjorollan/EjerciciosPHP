<?php
include_once "Usuario.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

   // Constructor privado  Patron singleton
   
    private function __construct(){
        
       
         $this->dbh = new mysqli(DB_SERVER,DB_USER,DB_PASSWD,DATABASE);
         
      if ( $this->dbh->connect_error){
         die(" Error en la conexión ".$this->dbh->connect_errno);
        } 

    }

    public function numFilas ():int {
        $resultado=$this->dbh->query("SELECT id FROM clientes");
        $cantidadfilas=$resultado->num_rows;  
        return $cantidadfilas;
      } 

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh->close();
            self::$modelo = null; // Borro el objeto.
        }
    }

    // SELECT Devuelvo la lista de Usuarios
    public function getUsuarios ($inicio,$cantidad):array {
        $tcli = [];
        // Crea la sentencia preparada
        $stmt_cliente  = $this->dbh->prepare("select * from clientes limit $inicio,$cantidad");
        // Si falla termian el programa
        if ( $stmt_cliente == false) die (__FILE__.':'.__LINE__.$this->dbh->error);
        // Ejecuto la sentencia
        $stmt_cliente->execute();
        // Obtengo los resultados
        $resultado = $stmt_cliente->get_result();
        // Si hay resultado correctos
        if ( $resultado ){
            // Obtengo cada fila de la respuesta como un objeto de tipo Usuario
            while ( $user = $resultado->fetch_object('Usuario')){
               $tcli[]= $user;
            }
        }
        // Devuelvo el array de objetos
        return $tcli;
    }
    
    // SELECT Devuelvo un usuario o false
    public function getUsuario (String $login) {
        $user = false;
        
        $stmt_usuario   = $this->dbh->prepare("select * from clientes where id =?");
        if ( $stmt_usuario == false) die ($this->dbh->error);

        // Enlazo $login con el primer ? 
        $stmt_usuario->bind_param("s",$login);
        $stmt_usuario->execute();
        $resultado = $stmt_usuario->get_result();
        if ( $resultado ){
            $user = $resultado->fetch_object('Usuario');
            }
        
        return $user;
    }
    
    // UPDATE
    public function modUsuario($user):bool{
      
        $stmt_moduser   = $this->dbh->prepare("update clientes set id=?, first_name=?, email=? , gender=?,ip_address=?,telefono=? where id=?");
        if ( $stmt_moduser == false) die ($this->dbh->error);

        $stmt_moduser->bind_param("sssssss",$user->id,$user->first_name, $user->email, $user->gender,$user->ip_address,$user->telefono,$user->id);
        $stmt_moduser->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }

    //INSERT
    public function addUsuario($user):bool{
       
        $stmt_creauser  = $this->dbh->prepare("insert into clientes (id,first_name,email,gender,ip_address,telefono) Values(?,?,?,?,?,?)");
        if ( $stmt_creauser == false) die ($this->dbh->error);

        $stmt_creauser->bind_param("ssssss",$user->id,$user->first_name, $user->email, $user->gender,$user->ip_address,$user->telefono);
        $stmt_creauser->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }
     
    //DELETE
    public function borrarUsuario(String $id):bool {
        $stmt_boruser   = $this->dbh->prepare("delete from clientes where id =?");
        if ( $stmt_boruser == false) die ($this->dbh->error);
       
        $stmt_boruser->bind_param("s", $id);
        $stmt_boruser->execute();
        $resu = ($this->dbh->affected_rows  == 1);
        return $resu;
    }  
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}


<?php
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }

    private function __construct(){

        try {
            $dsn = "mysql:host=".DB_SERVER.";dbname=".DATABASE.";charset=utf8";
            $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }   
    }


    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->dbh->close();
            self::$modelo = null;
        }
    }



    public function numClientes ():int {
      $result = $this->dbh->query("select id from Clientes");
      $num = $result->rowCount();  
      return $num;
    } 
    

    public function getClientes ($primero,$cuantos):array {
        $tuser = [];
        $stmt_usuarios  = $this->dbh->prepare("select * from Clientes limit $primero,$cuantos");
        
        $stmt_usuarios->setFetchMode(PDO::FETCH_CLASS,'Cliente');
        
        if ( $stmt_usuarios->execute() ){
            while ( $user = $stmt_usuarios->fetch()){
               $tuser[]= $user;
            }
        }
        return $tuser;
    }
      

    public function getCliente (int $id) {
        $cli = false;
        
        $stmt_usuario   = $this->dbh->prepare("select * from Clientes where id =:id");
        $stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $stmt_usuario->bindParam(':id', $id);
        if ( $stmt_usuario->execute() ){
            if ( $obj = $stmt_usuario->fetch()){
               $user= $obj;
           }
       }
       return $user;
    }

    public function getClienteSiguiente($id){

        $cli = false;
        
        $stmt_usuario   = $this->dbh->prepare("select * from Clientes where id >:id limit 1");
        $stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $stmt_usuario->bindParam(':id', $id);
        if ( $stmt_usuario->execute() ){
             if ( $obj = $stmt_usuario->fetch()){
                $cli= $obj;
            }
        }
        return $cli;

    }
    public function getClienteAnterior($id){

        $cli = false;
        
        $stmt_usuario   = $this->dbh->prepare("select * from Clientes where id <:id order by id DESC limit 1");
        $stmt_usuario->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $stmt_usuario->bindParam(':id', $id);
        if ( $stmt_usuario->execute() ){
             if ( $obj = $stmt_usuario->fetch()){
                $cli= $obj;
            }
        }
        return $cli;
    }

    public function modCliente($cli):bool{
      
        $stmt_moduser   = $this->dbh->prepare("UPDATE Clientes set first_name=:fs_name,last_name=:ls_name,email=:email,".
         "gender=:gender, ip_address=:ip_address,telefono=:telefono WHERE id=:id");
         $stmt_moduser->bindValue(':fs_name',$cli->first_name);
         $stmt_moduser->bindValue(':ls_name',$cli->last_name);
         $stmt_moduser->bindValue(':email',$cli->email);
         $stmt_moduser->bindValue(':gender',$cli->gender);
         $stmt_moduser->bindValue(':ip_address',$cli->ip_address);
         $stmt_moduser->bindValue(':telefono',$cli->telefono);
         $stmt_moduser->bindValue(':id',$cli->id);
         $stmt_moduser->execute();
         $resu = ($stmt_moduser->rowCount () == 1);
         return $resu;
    }
  

    public function addCliente($cli):bool{
       
        $stmt_creauser  = $this->dbh->prepare(
            "INSERT INTO `Clientes`( `first_name`, `last_name`, `email`, `gender`, `ip_address`, `telefono`)".
            "Values(?,?,?,?,?,?)");

            $stmt_crearcli->bindValue(1,$cli->first_name);
            $stmt_crearcli->bindValue(2,$cli->last_name);
            $stmt_crearcli->bindValue(3,$cli->email);
            $stmt_crearcli->bindValue(4,$cli->gender);
            $stmt_crearcli->bindValue(5,$cli->ip_address);
            $stmt_crearcli->bindValue(6,$cli->telefono);    
            $stmt_crearcli->execute();
            $resu = ($stmt_creauser->rowCount () == 1);
            return $resu;
    }
   

    public function borrarCliente(int $id):bool {
        $stmt_boruser   = $this->dbh->prepare("delete from Clientes where id =:id");
        $stmt_boruser->bindValue(':id', $id);
        $stmt_boruser->execute();
        $resu = ($stmt_boruser->rowCount () == 1);
        return $resu;
    }  
    
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }

    
}




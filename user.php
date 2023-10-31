<?php
 include 'BaseDatos.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $id = $_POST['id'];
    $mail = $_POST['email'];

$btn = $_POST['Btn'];

class User {
  public $ID;
  public $Username;
  public $Password;
  public $Email;

  public function __construct($ID,$Username,$Password,$Email)
  {
    $this->ID =$ID;
    $this->Username =$Username;
    $this->Password = $Password;
    $this->Email = $Email;
  }

  public function getID(){
    return $this->ID;
  }
  public function getUsername(){
    return $this->Username;
  }
  public function getPassword(){
    return $this->Password;
  }
  public function getEmail(){
    return $this->Email;
  }


  public function setID(){
    return $this->ID;
  }
  public function setUsername(){
    return $this->Username;
  }
  public function setPassword(){
    return $this->Password;
  }
  public function setEmail(){
    return $this->Email;
  }
}

class Datos {

    private $baseDeDatos;
  
      public function __construct($baseDeDatos)
      {
        $this->baseDeDatos = $baseDeDatos;
      }
  
      public function agregar(User $users){
  
        $sql = "INSERT INTO usuarios (Id,username,password,email) VALUES (?,?,?,?)";
        $parametros = [$users->getID(),$users->getUsername(),$users->getPassword(),$users->getEmail()];
        $this->baseDeDatos->consultaAg($sql,$parametros);
        echo'
        <script>
        alert("Usuario registrado exitosamente.");	
            location.href="index.php";		
        </script>';
      }

      public function login($user,$passw){

        $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";      
        $this->baseDeDatos->consulta($sql,[$user,$passw]);
        echo'
        <script>         	
            location.href="Panelpost.php";		
        </script>';
      }
  
}

$BD = new B_Datos("localhost", "root", "", "bd_blog");
$BD->conectar();


if ($btn == 'Entrar'){    
  
if ($user == "" || $pass ==""){
  echo'
  <script>
  alert("Los campos deben estar llenos. ");	
  location.href="index.php";		
  </script>';

}else{
  $datos = New Datos($BD);
  $datos->login($user,$pass);
}
 
} else
 if ($btn == 'Regis'){
    echo'
      <script>     	     	
      location.href="registro.php";		
      </script>';
} 
 else 
 if ($btn == 'Guardar'){    
  
  if ($user == "" || $pass =="" || $id==""||$mail==""){
    echo'
    <script>
    alert("Los campos deben estar llenos. ");	
    location.href="registro.php";		
    </script>';
  
  }else{
    
    $users = new User ($id,$user,$pass,$mail);
    $datos = New Datos($BD);
    $datos->agregar($users);
  }
   
  }
?>
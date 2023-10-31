<style>
  table {   
    width: 95%;
    border-collapse: collapse;
    margin: 20px;
    font-size: 20px;
    font-weight: bold;  
  
  }
  h1 {
    font-size: 40px;
    text-align: center;
  }

  table, th, td {
    border: 1px solid black;
   
  }

  th, td {
    padding: 10px;
    text-align: center;
  }   
</style>
<?php
 include 'BaseDatos.php';

    $id = $_POST['NumID'];
    $post_id = $_POST['id_pub'];
    $cont = $_POST['area'];
    $aut = 0;
    $creat= 0;

    $btn = $_POST['Btn'];

class Comment{
  public $ID;
  public $Post_id;
  public $contenido;
  public $author;
  public $created;
 

  public function __construct($ID,$Post_id, $contenido,$author,$created)
  {
    $this->ID =$ID;
    $this->Post_id =$Post_id;
    $this->contenido = $contenido;
    $this->author = $author;
    $this->created = $created;
  }

  public function getID(){
    return $this->ID;
  }
  public function getPostid(){
    return $this->Post_id;
  }
  public function getContenido(){
    return $this->contenido;
  }
  public function getAuthor(){
    return $this->author;
  }
  public function getCreated(){
    return $this->created;
  }

  public function setID(){
    return $this->ID;
  }
  public function setPostid(){
    return $this->Post_id;
  }
  public function setContenido(){
    return $this->contenido;
  }
  public function setAuthor(){
    return $this->author;
  }
  public function setCreated(){
    return $this->created;
  }
}

class Datos {

    private $baseDeDatos;
  
      public function __construct($baseDeDatos)
      {
        $this->baseDeDatos = $baseDeDatos;
      }
  
      public function agregar(Comment $comm){  
        $sql = "INSERT INTO comentarios (id,post_id,content,author_id,created_at) VALUES (?,?,?,?,?)";
        $parametros = [$comm->getID(),$comm->getPostid(),$comm->getContenido(),$comm->getAuthor(),$comm->getCreated()];
        $this->baseDeDatos->consulta($sql,$parametros);
        echo'
        <script>
        alert("Comentario registrada exitosamente.");	
            location.href="Panelpost.php";		
        </script>';
      }

      public function modificar(Comment $comm){    
        $sql = "UPDATE comentarios SET title = ?, content = ?, author_id = ?, created_at = ? WHERE id = ?";
        $parametros = [$comm->getPostid(),$comm->getContenido(),$comm->getAuthor(),$comm->getCreated(),$comm->getID()];
        $this->baseDeDatos->consulta($sql,$parametros);
        echo'
        <script>
        alert("Publicación modificada exitosamente.");	
            location.href="Panelpost.php";		
        </script>';       
      }    

      public function mostrar(){
        $sql = "SELECT * FROM comentarios";
          $stmt = $this->baseDeDatos->consulta($sql,[]);
          return $stmt;           
      }

      public function eliminar($id){  
        $sql = "DELETE FROM comentarios WHERE Id = ?";      
        $this->baseDeDatos->consulta($sql,[$id]);  
        echo'
        <script>
        alert("Publicación eliminada exitosamente.");	
            location.href="Panelpost.php";		
        </script>';        
      }
  
}
$comm = new Comment ($id,$post_id,$cont,$aut,$creat);   

$BD = new B_Datos("localhost", "root", "", "bd_blog");
$BD->conectar();

if ($btn == 'Guardar'){  
  if ($id == "" || $post_id =="" || $cont==""){
    echo'
    <script>
    alert("Los campos deben estar llenos. ");	
    location.href="Panelpost.php";		
    </script>';
  
  }else{ 

    $datos = New Datos($BD);
    $datos->agregar($comm);   
     }
 
} else

 if ($btn == 'Editar'){ 
  if ($id == "" || $post_id =="" || $cont==""){
    echo'
    <script>
    alert("Los campos deben estar llenos. ");	
    location.href="Panelpost.php";		
    </script>';
  
  }else{    
    
    $datos = new Datos($BD);
    $datos->modificar($comm);  
   }
} 
 else 
 if ($btn == 'Mostrar'){     

        $datos = New Datos($BD);            
        $result = $datos->mostrar();
        echo '<h1> Tabla de Comentarios de  las Publicaciones</h1>';
          if (!empty($result)) {
            echo '<table>';
            // Imprime la fila de encabezados de la tabla
            echo '<tr>';
            // foreach ($result[0] as $clave => $valor) {
            //     echo '<th>' . $clave . '</th>';
            // }

                echo '<th>' . "Id #". '</th>';
                echo '<th>' . "Id  Post". '</th>';
                echo '<th>' . "Comentario". '</th>';
                echo '<th>' . "#  ". '</th>';
                echo '<th>' . "#  ". '</th>';
            echo '</tr>';

            // Imprime los datos del arreglo en filas de la tabla
            foreach ($result as $fila) {
                echo '<tr>';
                foreach ($fila as $valor) {
                    echo '<td>' . $valor . '</td>';
                }
                echo '</tr>';
            }

            echo '</table>';
          } else {
            echo 'El arreglo está vacío.';
          }      
    }
    else 
    if ($btn == 'Eliminar'){ 
      if ($id == ""){
        echo'
        <script>
        alert("Debe colocar el valor de Id a eliminar. ");	
        location.href="Panelpost.php";		
        </script>';
      
      }else{
        $datos = new Datos($BD);
        $datos->eliminar($id); 
     }               
     } 

?>
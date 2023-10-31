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
    $titulo = $_POST['Title'];
    $cont = $_POST['area'];
    $aut = 0;
    $creat= 0;

    $btn = $_POST['Btn'];

class Post{
  public $ID;
  public $titulo;
  public $contenido;
  public $author;
  public $created;
 

  public function __construct($ID,$titulo, $contenido,$author,$created)
  {
    $this->ID =$ID;
    $this->titulo =$titulo;
    $this->contenido = $contenido;
    $this->author = $author;
    $this->created = $created;
  }

  public function getID(){
    return $this->ID;
  }
  public function getTitulo(){
    return $this->titulo;
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
  public function setTitulo(){
    return $this->titulo;
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
  
      public function agregar(Post $post){  
        $sql = "INSERT INTO publicaciones (id,title,content,author_id,created_at) VALUES (?,?,?,?,?)";
        $parametros = [$post->getID(),$post->getTitulo(),$post->getContenido(),$post->getAuthor(),$post->getCreated()];
        $this->baseDeDatos->consulta($sql,$parametros);
        echo'
        <script>
        alert("Publicación registrada exitosamente.");	
            location.href="Panelpost.php";		
        </script>';
      }

      public function modificar(Post $post){    
        $sql = "UPDATE publicaciones SET title = ?, content = ?, author_id = ?, created_at = ? WHERE id = ?";
        $parametros = [$post->getTitulo(),$post->getContenido(),$post->getAuthor(),$post->getCreated(),$post->getID()];
        $this->baseDeDatos->consulta($sql,$parametros);
        echo'
        <script>
        alert("Publicación modificada exitosamente.");	
            location.href="Panelpost.php";		
        </script>';       
      }    

      public function mostrar(){
        $sql = "SELECT `title`, `content` FROM `publicaciones`";
                $stmt = $this->baseDeDatos->consulta($sql,[]);
          return $stmt;           
      }

      public function mostrar2(){
        $sql = "SELECT P.title, C.content FROM publicaciones P INNER JOIN comentarios C WHERE P.id = C.post_id";
                $stmt = $this->baseDeDatos->consulta($sql,[]);
          return $stmt;           
      }

      public function eliminar($id){  
        $sql = "DELETE FROM publicaciones WHERE Id = ?";      
        $this->baseDeDatos->consulta($sql,[$id]);
        echo'
        <script>
        alert("Publicación eliminada exitosamente.");	
            location.href="Panelpost.php";		
        </script>';           
      }
  
}
$post = new Post ($id,$titulo,$cont,$aut,$creat);   

$BD = new B_Datos("localhost", "root", "", "bd_blog");
$BD->conectar();

if ($btn == 'Guardar'){ 
  if ($id == "" || $titulo =="" || $cont==""){
    echo'
    <script>
    alert("Los campos deben estar llenos. ");	
    location.href="Panelpost.php";		
    </script>';
  
  }else{ 

    $datos = New Datos($BD);
    $datos->agregar($post);
   }
 
} else

 if ($btn == 'Editar'){   
  if ($id == "" || $titulo =="" || $cont==""){
    echo'
    <script>
    alert("Los campos deben estar llenos. ");	
    location.href="Panelpost.php";		
    </script>';
  
  }else{ 
    
    $datos = new Datos($BD);
    $datos->modificar($post);  
   }
} 
 else 
 if ($btn == 'Mostrar'){  
  
  echo'
    <script>
    
    location.href="publicaciones.php";		
    </script>';

        // $datos = New Datos($BD);            
        // $result = $datos->mostrar();
        // echo '<h1> Tabla de Publicaciones</h1>';
        //   if (!empty($result)) {
        //     echo '<table>';
            
        //     echo '<tr>';
           
        //         echo '<th>' . "Id #". '</th>';
        //         echo '<th>' . "Titulo". '</th>';
        //         echo '<th>' . "Contenido". '</th>';
        //         echo '<th>' . "#  ". '</th>';
        //         echo '<th>' . "#  ". '</th>';
                
         
        //     echo '</tr>';
            
        //     foreach ($result as $fila) {
        //         echo '<tr>';

        //         foreach ($fila as $valor) {
        //             echo '<td>' . $valor . '</td>';
        //         }
        //         echo '</tr>';
        //     }

        //     echo '</table>';
        //   } else {
        //     echo 'El arreglo está vacío.';
        //   }      
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
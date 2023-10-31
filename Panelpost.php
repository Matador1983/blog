<!DOCTYPE html>
<html>
<head>
  <!-- METADATOS--> 
  <meta charset="utf-8">
  <meta name="author" content="Antonio Izzo">
  
  <!--Titulo-->
  <title>Pagina Web de Productos</title>  
  <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="Style.css">
    <!--Incluir Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<body>
<section class="panelpost">
  <h3>Panel para las Publicaciones</h3>
  <form  action="Post.php" method="POST">
    <div class="row">      
        <div class = "columna col-3"> 
          <h1 for="NumID">Id Publicidad:</h1>                  
          <input type="text" id="id" name= "NumID" value="">
        </div>
        <div class = "columna col-3">
          <h1 for="title">Titulo de la Publicidad:</h1>
          <input type="text" id="titulo" name= "Title" value=""> 
        </div>
        <div class = "columna col-6">          
          <h1 for="Area">Contenido:</h1>
          <textarea  type="text" name ="area" ></textarea>
        </div>      
    </div>
    <div class="row">
      <div class = "columna1 col-3">  
        <button type="submit" class="btn" name="Btn"  value="Guardar">
          Guardar
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>   
      </div>
      <div class = "columna1 col-3">
        <button type="submit" class="btn" name="Btn" value="Editar">
          Editar
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>
      </div>
      <div class = "columna1 col-3"> 
        <button type="submit" class="btn" name="Btn" value="Eliminar">
          Eliminar
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>     
      </div>
      <!-- <div class = "columna1 col-3"> 
        <button type="submit" class="btn" name="Btn" value="Mostrar">
          Mostrar Listado
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>     
      </div> -->
    </div>  
  </form>
</section> 

<section class="panelpost">
  <h3>Panel para los Comentarios</h3>
  <form  action="Comment.php" method="POST">
    <div class="row">      
        <div class = "columna col-3"> 
          <h1 for="NumID">Id Comentario:</h1>                  
          <input type="text" id="id" name= "NumID" value="">
        </div>
        <div class = "columna col-3">
          <h1 for="title">Id de la Publicidad:</h1>
          <input type="text" id="titulo" name= "id_pub" value=""> 
        </div>
        <div class = "columna col-6">          
          <h1 for="Area">Comentario:</h1>
          <textarea  type="text" name ="area" ></textarea>
        </div>      
    </div>
    <div class="row">
      <div class = "columna1 col-3">  
        <button type="submit" class="btn" name="Btn"  value="Guardar">
          Guardar
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>   
      </div>
      <div class = "columna1 col-3">
        <button type="submit" class="btn" name="Btn" value="Editar">
          Editar
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>
      </div>
      <div class = "columna1 col-3"> 
        <button type="submit" class="btn" name="Btn" value="Eliminar">
          Eliminar
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>     
      </div>
      <!-- <div class = "columna1 col-3"> 
        <button type="submit" class="btn" name="Btn" value="Mostrar">
          Mostrar Listado
          <i class="bi bi-arrow-right-circle-fill"></i>
        </button>     
      </div> -->
    </div>  
  </form>
</section> 



<section class="datos">
  <div class="row">
    <div class = "columna col-12"> 
    <h2>Publicaciones</h2>
      <?php
        error_reporting(0);
         include 'Post.php';

        $BD = new B_Datos("localhost", "root", "", "bd_blog");
        $BD->conectar();
        $datos = New Datos($BD);            
        $result = $datos->mostrar();

          if (!empty($result)) {
            echo '<table>';
            // Imprime la fila de encabezados de la tabla
            echo '<tr>';
            // foreach ($result[0] as $clave => $valor) {
            //     echo '<th>' . $clave . '</th>';
            // }

            echo '<th>' . "Titulo". '</th>';
                echo '<th>' . "Contenido". '</th>';
                
                
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
      ?>
    </div>
  </div>
</section> 

<section class="datos">
  <div class="row">
    <div class = "columna col-12"> 
    <h2>Comentarios</h2>
      <?php
      

        $BD = new B_Datos("localhost", "root", "", "bd_blog");
        $BD->conectar();
        $datos = New Datos($BD);            
        $result = $datos->mostrar2();

          if (!empty($result)) {
            echo '<table>';
            // Imprime la fila de encabezados de la tabla
            echo '<tr>';
            // foreach ($result[0] as $clave => $valor) {
            //     echo '<th>' . $clave . '</th>';
            // }

            echo '<th>' . "Publicidad ". '</th>';
                echo '<th>' . "Comentario". '</th>';
                
                
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
      ?>
    </div>
  </div>
</section> 


</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- METADATOS--> 
  <meta charset="utf-8">
  <meta name="author" content="Antonio Izzo">
  
  <!--Titulo-->
  <title>BLOG</title>  
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="Style.css">
  <!--Incluir Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <section class="datos text-center">
  <h4>Bienvenido al Blog</h4>
  </section>
	<section class="datos text-center">
    <div class="row">
      <div class = "columna1 col-4">
      </div>
      <div class = "columna col-4">
        <form  action="user.php" method="POST">
            <h2>Inicio de Sesion</h2>
            <h1 for="User">Username:</h1>
            <input type="text" name= "user" value=""> 				
            <h1 for="Pass">Prassword:   </h1>
            <input type="password" name= "pass" value="">	
            <button type="submit" class="btn" name="Btn"  value="Entrar">
              Login
              <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
            <button type="submit" class="btn" name="Btn"  value="Regis">
              Registrarse
              <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
        </form>
      </div>
    </div>
	</section>

	<!-- <section class="botones">
    <div class="row">    
      <div class="columna col-4">
        <form action="mostrar.php" method="POST">              
            
            <button type="submit" class="btn">
                Mostrar
                <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
        </form>
        
      </div>
      <div class="columna col-4">        
        <form action="Eliminar.php" method="POST">                
           
            <button type="submit" class="btn">
              Eliminar Impares
              <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
        </form>
      </div>
      <div class="columna col-4">        
        <form action="generar.php" method="POST">                
            
            <button type="submit" class="btn">
              Generar Productos
              <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
        </form>
      </div>
      
 
    </div>
	</section> -->

</body>

</html>
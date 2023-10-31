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
    <div class="row">
      <div class = "columna1 col-4">
      </div>
      <div class = "columna col-4">
        <form  action="user.php" method="POST">
            <h2>Registro de Usuario</h2>
            <h1 for="Id">ID:</h1>
            <input type="text" name= "id" value=""> 	
            <h1 for="User">Username:</h1>
            <input type="text" name= "user" value="">			
            <h1 for="Pass">Prassword:   </h1>
            <input type="password" name= "pass" value="">             				
            <h1 for="Email">Email:   </h1>
            <input type="text" name= "email" value="">
            
            <button type="submit" class="btn" name="Btn"  value="Guardar">
              Crear Usuario
              <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
            
        </form>
      </div>
    </div>
	</section>


</body>

</html>
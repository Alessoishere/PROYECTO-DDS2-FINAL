<?php

    include 'include/conexion.php';

    $consulta = "SELECT * FROM talumno";
    $guardar = $conecta->query($consulta);

?>

<!DOCTYPE html>
<html>

<head>
  <title>PEDIDO</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Source code generated using layoutit.com">
	<meta name="author" content="LayoutIt!">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <!----hero Section start---->

  <div class="hero">
    <nav>
			<h2 class="logo">Correcamin<span>Os</span></h2>
			<ul>
				
				<li><a href="index.html">HOME</a></li>
                <li><a href="alumno.php">producto</a></li>
				<li><a href="asignatura.php">clientes</a></li>
                <li><a href="docente.php">pedido</a></li>
			</ul>
			<a href="include/salir.php" class="btn">LogOut</a>
	</nav>

    <?php
            include ('DAO/AlumnoDAO.php');
            $dao = new AlumnoDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $alumno = new Alumno();
                    $alumno->setCodAlumno($_POST["txtcodalumno"]);
                    $alumno->setAPaterno($_POST["txtapaterno"]);
                    $alumno->setAMaterno($_POST["txtamaterno"]);
                    $alumno->setNombres($_POST["txtnombres"]);
                    $alumno->setUsuario($_POST["txtusuario"]);
                    $alumno->setCodCarrera($_POST["txtcodcarrera"]);
                    $i =  $dao->Agregar($alumno);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego prodcuto');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego producto');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodalumno"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino producto');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino producto');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $alumno = new Alumno();
                    $alumno->setCodAlumno($_POST["txtcodalumno"]);
                    $alumno->setAPaterno($_POST["txtapaterno"]);
                    $alumno->setAMaterno($_POST["txtamaterno"]);
                    $alumno->setNombres($_POST["txtnombres"]);
                    $alumno->setUsuario($_POST["txtusuario"]);
                    $alumno->setCodCarrera($_POST["txtcodcarrera"]);
                    $i =  $dao->Actualizar($alumno);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo prodcuto');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo prodcuto');</script>";	
                    }
                }
            }
    ?>
        <center>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <p>Numero de Pedido:  <input type="text" name="txtcodalumno"></p>
                    <p>Nombre del Producto:  <input type="text" name="txtapaterno"></p>
                    <p>Tipo de Producto:  <input type="text" name="txtamaterno"></p>
                    <p>Descripcion del Producto:  <input type="text" name="txtnombres"></p>
                    <p><input type="hidden" name="txtusuario"value="Admin"></p>
                    <p><input type="hidden" name="txtcodcarrera"value="C0001"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                </form>	
            </div>
            <div class="col-md-8">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h3 class="text-center">Tabla Dinamica</h3>
                    <div class="table-responsive table-hover" id="TablaConsulta">
                        <table class="table">
                            <thead class="text-muted">
                                <th class="text-center">Numero de Pedido</th>
                                <th class="text-center">Nombre del Producto</th>
                                <th class="text-center">Tipo de Producto</th>
                                <th class="text-center">Descripcion del Producto</th>
                            </thead>
                            <tbody>
                                <?php while($row = $guardar->fetch_assoc()){?>
                                <tr>
                                    <td class="text-center"><?php echo $row['codAlumno']; ?></td>
                                    <td class="text-center"><?php echo $row['aPaterno']; ?></td>
                                    <td class="text-center"><?php echo $row['aMaterno']; ?></td>
                                    <td class="text-center"><?php echo $row['nombres']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </center>
        

  <!------footer start--------->
  <footer>
    <p>----------------------------</p>
    <p>Alessandro Fernandez la Rosa</p>
    <p>Orlando Andre Gonzales Vilcas</p>
    <p>Anthony Benmar Inquiltupa Morales</p>
    <p>Alvaro Ruben Quispe Huallpa</p>
    <div class="social">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-dribbble"></i></a>
    </div>
    <p class="end">Todos los derechos reservados ℗</p>
  </footer>
</body>

</html>
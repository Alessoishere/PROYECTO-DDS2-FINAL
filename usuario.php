<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Source code generated using layoutit.com">
		<meta name="author" content="LayoutIt!">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Source code generated using layoutit.com">
	<meta name="author" content="LayoutIt!">
		<title>Mantenimiento de Usuario</title>
	</head>
    <body>
    <div class="hero">
		<nav>
			<h2 class="logo">Academic<span>Ó</span></h2>
			<ul>
				
				<li><a href="index.html">HOME</a></li>
                <li><a href="asignatura.php">ASIGNATURA</a></li>
                <li><a href="alumno.php">ALUMNO</a></li>
                <li><a href="docente.php">DOCENTE</a></li>
                <li><a href="usuario.php">USUARIO</a></li>
			</ul>
			<a href="include/salir.php" class="btn">LogOut</a>
		</nav>

        <?php
            include ('DAO/UsuarioDAO.php');
            $dao = new UsuarioDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $usuario = new Usuario();
                    $usuario->setUsuario($_POST["txtusuario"]);
                    $usuario->setContrasenia($_POST["txtcontrasenia"]);
                    $i =  $dao->Agregar($usuario);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego usuario');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego usuario');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtusuario"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino usuario');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino usuario');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $usuario = new Usuario();
                    $usuario->setUsuario($_POST["txtusuario"]);
                    $usuario->setContrasenia($_POST["txtcontrasenia"]);
                    $i =  $dao->Actualizar($usuario);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo usuario');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo usuario');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <p>Usuario:  <input type="text" name="txtusuario"></p>
                    <p>Contrasenia:  <input type="text" name="txtcontrasenia"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                </form>	
            </div>
            <div class="col-md-8">
                <?php
                    echo "<br><br><h5>Listar</h5><br>";
                    print_r($dao->Listar());
                ?>
            </div>
        </div>
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
        <br><br>
        <p class="end">Todos los derechos reservados ℗</p>
    </footer>
    </body>
</html>
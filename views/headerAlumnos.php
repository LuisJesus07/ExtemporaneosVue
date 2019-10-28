<?php session_start(); 
	if(empty($_SESSION['datosUsuario']['privilegios']) || $_SESSION['datosUsuario']['privilegios'] != 2){
	header("location:../login/login_view.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Extemporáneos</title>
	<!--<link rel="stylesheet" type="text/css" href="../css/style.css">-->
	<link rel="stylesheet" type="text/css" href="../../public/css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600&display=swap" rel="stylesheet">
	<link rel="icon" type="image/vnd.microsoft.icon" href="../../public/img/favicon.ico">

</head>
<body>

	<div class="wrapper">

		<nav class="navbar navbar-expand-lg">
		  <div class="container">
			  <a class="navbar-brand" href="menuAlumnos.php"><img class="logo-brand" src="../../public/img/logouabcs1.png"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <i class="fas fa-bars"></i>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="menuAlumnos.php"><i class="fas fa-home"></i> Inicio</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="solicitarExamen.php"><i class="fa fa-clipboard fa-fw"></i> Solicitar Examen</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="consultarExamenes.php"><i class="fa fa-clipboard fa-fw"></i> Mis Exámenes</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="../../API/controllers/login/cerrarSesion.php" tabindex="-1" aria-disabled="true"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
			      </li>
			    </ul>
			  </div>
		  </div>
		</nav>


	</div>


</body>
</html>
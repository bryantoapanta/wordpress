<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" content="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<title>Tiendas Castor</title>
<script>

	$( function() {
    $( "#tabs" ).tabs();
  } );

		$( function() {
    $( "#cabecera" ).tabs();
  } );
</script>
<style>
	body{
		background-image: url('images/fondo1.jpg');
		background-repeat: no-repeat;
	}
#cabecera{

		background-image: url('images/luxenter.jpg');
		background-repeat: no-repeat;
		background-position: center;
		background-size: 60% 100%; 
		height: 150px;
		border-radius: 15px;
	}
	
</style>
<script>
	window.fwSettings={
	'widget_id':43000000381
	};
	!function(){if("function"!=typeof window.FreshworksWidget){var n=function(){n.q.push(arguments)};n.q=[],window.FreshworksWidget=n}}() 
</script>
<script type='text/javascript' src='https://widget.freshworks.com/widgets/43000000381.js' async defer></script>
</head>
<body>

	
<?php
	

	include('include/connect.php');
	$con=mysqli_connect($hostname, $username, $password, $database);
	// Check connection
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}	
		
	$msc=microtime(true);	
	$meses = 3;
	
	//Aumentamos el tiempo de consulta
	set_time_limit(120);

	
	echo "<left>";	
	
		// Abrimos sesion 

	session_start();

     if(!isset($_SESSION['usuario']))// and $_SESSION['estado'] == 'Autenticado') 
     { 
            // Entramos a la pagina de index.php
     		set_time_limit(1800);
     }
     else 
     {   
            // Usuario que no se ha logueado 
            echo "No tienes permiso para entrar a esta pagina inicie sesion en tiendas.luxenter.com"; 
            exit(); 
     }
     	
     	//Pasamos los datos de la tienda en concreto.

	if (!isset($_GET['idTienda']) )
	{
		echo "Sin Identificador de Tienda Especificado...";
		exit();
	} 
	
	$idTienda = $_GET['idTienda'];
	
	//if (!isset($_SESSION["idTiendaSession"])) 
	//{
	//	echo "No tengo Session";
	//	exit();
  	//	//header('Location: login.php');
	//} 
	//else 
	//{
  	//	$idTienda = $_SESSION["idTiendaSession"];
	//}

	
	$query = "SELECT
					id_solapa, nombre_solapa
				FROM 
					paginas_portal
				WHERE 
					activado = 1 
				AND 
					id_tienda = " .$idTienda. " GROUP BY id_solapa, nombre_solapa ORDER BY orden_solapa";
	
	$solapas = mysqli_query($con, $query);
	
	$i = 1;
	
	echo "<div id='cabecera'>

			</div>";
	echo "<div id='tabs'>";
	echo "<ul>";

	while($row = mysqli_fetch_array($solapas)) 
	{
		echo "<li><a href='#tabs-" .$row['id_solapa']. "'>" . $row['nombre_solapa'] . "</a></li>";
	}

	echo "</ul>";

	$query2 = "SELECT
					id_solapa, nombre_solapa, id_opcion, nombre_opcion, url_opcion
				FROM 
					paginas_portal
				WHERE 
					activado = 1 
				AND 
					id_tienda = " .$idTienda. " ORDER BY orden_solapa, orden_opcion";

	$valorAnterior="";

	$opciones = mysqli_query($con, $query2);

	//echo $query2;

	while($row2 = mysqli_fetch_array($opciones)) 
	{
		if($valorAnterior=="")
		{	
			//En el caso de crear la primera pestaña
			echo "<div id='tabs-" .$row2['id_solapa']."'>";
			//CabeceraTabla();
			$valorAnterior = $row2['id_solapa'];
			echo "<ul>";
			
		}
		else
		{
			if($valorAnterior <> $row2['id_solapa'])
			{
				//Cerramos la pestaña
				echo "</ul>";
				echo "</div>";

				//Creamos la nueva
				echo "<div id='tabs-" .$row2['id_solapa']."'>";
				$valorAnterior = $row2['id_solapa'];			
			}
		}

		//echo "<p>" .$row2['nombre_opcion']. "</p>";
		echo "<li id='menu'><a href='" .$row2['url_opcion']. "' target='_blank'>" .$row2['nombre_opcion']. "</a></li>";
	}

	echo "</div>";
	
	
	
	echo "</body>";
	echo "</html>";

	mysqli_close($con);
?>

</body>
</html>
<?php 
	session_start();
	require_once "database.php"; 

	try {
	    $database = new Database();

	    // Conectar a MySQL
	    $conn = $database->connect();

	    //echo "Conexión exitosa a MySQL 1";

	    // Ejemplo de consulta
	    $stmt = $conn->query("Select * from users where email = '".$_POST['email']."' and password = '".$_POST['password']."'");

	    //var_dump($stmt);

	    $resultado = $stmt->fetch(); 

	    if (isset($resultado['id'])) {
	    	

	    	$_SESSION['id'] = $resultado['id'];
	    	$_SESSION['email'] = $resultado['email'];
	    	$_SESSION['name']  = $resultado['name'];

	    	header('Location:users.php');
	    }

	    // Cerrar conexión
	    $database->disconnect();

	} catch (RuntimeException $e) {
	    echo "Error al conectar con la base de datos.";
	}









?>
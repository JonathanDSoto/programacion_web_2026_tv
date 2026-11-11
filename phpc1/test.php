<?php 

	require_once "database.php"; 

	try {
	    $database = new Database();

	    // Conectar a MySQL
	    $conn = $database->connect();

	    echo "Conexión exitosa a MySQL";

	    // Ejemplo de consulta
	    $stmt = $conn->query("Select * from users where email = '".$_POST['email']."' and password = '".$_POST['password']."'");

	    $resultado = $stmt->fetch(); 

	    

	    // Cerrar conexión
	    $database->disconnect();

	} catch (RuntimeException $e) {
	    echo "Error al conectar con la base de datos.";
	}
?>
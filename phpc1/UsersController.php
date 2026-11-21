<?php 

session_start();
require_once "database.php"; 

if (!isset($_SESSION['id'])) {
	header('Location:index.html');
}

class UsersController
{


	public function get()
	{

		try {
		    $database = new Database();

		    $conn = $database->connect(); 
		    
		    $stmt = $conn->query("Select * from users "); 

		    $resultado = $stmt->fetchAll(); 

		   	return $resultado;

		   
		    $database->disconnect();

		} catch (RuntimeException $e) {
		    echo "Error al conectar con la base de datos.";
		}

		return [];

	}

}

?>
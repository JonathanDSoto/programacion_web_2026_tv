<?php 

session_start();
require_once "database.php"; 

if (!isset($_SESSION['id'])) {
	header('Location:index.html');
}

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'create_user':
				
			$name = trim($_POST["name"] ?? "");
	        $email = trim($_POST["email"] ?? "");
	        $password = $_POST["password"] ?? ""; 

			$uc = new UsersController();

			if ($uc->newUser($name,$email,$password)) {
				header('Location:users.php?ok');
			}else{
				header('Location:users.php?error');
			}

			break;
		
		default:
			// code...
			break;
	}
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

		    $database->disconnect();

		   	return $resultado; 
		    

		} catch (RuntimeException $e) {
		    echo "Error al conectar con la base de datos.";
		}

		return [];

	}

	public function newUser($name,$email,$password)
	{

		try {
		    $database = new Database();

		    $conn = $database->connect(); 
		    
		    $stmt = $conn->query("INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '{$name}', '{$email}', '{$password}');"); 

		    $resultado = $stmt->fetch();   
		   
		    $database->disconnect();

		    return true;

		} catch (RuntimeException $e) {
		    echo "Error al conectar con la base de datos.";
		}

		return false;
	}

	public function removeUser($id)
	{
		try {
		    $database = new Database();

		    $conn = $database->connect(); 
		    
		    $stmt = $conn->query("DELETE FROM users WHERE `users`.`id` = {$id}"); 

		    $resultado = $stmt->rowCount(); 

		    $database->disconnect();

		   	return true; 
		    

		} catch (RuntimeException $e) {
		    echo "Error al conectar con la base de datos.";
		} 

		return false;
	}
}

?>
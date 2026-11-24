<?php 

    require_once "UsersController.php"; 

    $uc = new UsersController();
    
    if ($uc->removeUser($_GET['id'])) {
    	header('Location:users.php?ok');
	}else{
		header('Location:users.php?error');
	}

?>
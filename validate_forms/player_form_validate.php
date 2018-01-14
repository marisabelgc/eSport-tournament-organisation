<?php
require ('../connect.php');
global $connect;

if( 
	isset($_POST['name']) && 
	isset($_POST['last_name']) && 
	isset($_POST['email']) && 
	isset($_POST['username']) && 
	isset($_POST['tournament']))
{	
	if( $_POST['form_type'] == "add"){	
		// Verificar el email esta en uso
		$request = "SELECT COUNT(id) FROM player WHERE email='$_POST[email]'";
		$result = mysqli_query($connect, $request);
		$row = $result->fetch_row();
		if( $row[0] != 0){
			echo "Email already in use";
		}else{

			// Insertar la tabla en la BD
			$request = "INSERT INTO player (name, last_name, email, username) 
			VALUES ('$_POST[name]', '$_POST[last_name]', '$_POST[email]', '$_POST[username]')";
			$result = mysqli_query($connect, $request);

			// Saber el ID de la tabla insertada
			$request = "SELECT id FROM player WHERE username = '$_POST[username]'";
			$result = mysqli_query($connect, $request);
			$row = mysqli_fetch_assoc($result);

			// Unir players en una cadena de texto
			$SQLtournaments = "";
			for( $i = 0; $i < count($_POST['tournament']); $i++){
				$SQLtournaments .= "(".$_POST['tournament'][$i].", ".$row['id']."),";
			}
			$SQLtournaments = trim($SQLtournaments, ",");

			// Insertar los tournaments
			$request = "INSERT INTO tournament_player (tournament_id, player_id) VALUES $SQLtournaments";
			$result = mysqli_query($connect, $request);

			echo "success";	
		}
	}else{
		$request = "UPDATE player SET name = '$_POST[name]', last_name = '$_POST[last_name]', email ='$_POST[email]', username ='$_POST[username]' WHERE id = $_POST[id]";
		$result = mysqli_query($connect, $request);

		if( isset($_POST['tournament'] )){
			$request = "DELETE FROM tournament_player WHERE player_id = $_POST[id]";
			$result = mysqli_query($connect, $request);

			$SQLtournament = "";
			for( $i = 0; $i < count($_POST['tournament']); $i++){
				$SQLtournament .= "(".$_POST['id'].", ".$_POST['tournament'][$i]."),";
			}
			$SQLtournament = trim($SQLtournament, ",");

				// Insertar los sponsors
			$request = "INSERT INTO tournament_player (player_id, tournament_id) VALUES $SQLtournament";
			$result = mysqli_query($connect, $request);
		}

		echo "success";
	}
}

<?php
require ('../connect.php');
global $connect;

if( 
	isset($_POST['name']) && 
	isset($_POST['url']) && 
	isset($_POST['description']) && 
	isset($_POST['tournament']))
{
	// Verificar la URL
	if( !explode('http://', $_POST['url']) || !explode('https://', $_POST['url']) || !explode('www.', $_POST['url'])){
		echo "Invalid URL";

	}else{
		if( $_POST['form_type'] == "add"){
			// Verificar si ese sponsor no existe actualmente
			$request = "SELECT COUNT(id) FROM sponsor WHERE name='$_POST[name]'";
			$result = mysqli_query($connect, $request);
			$row = $result->fetch_row();
			if( $row[0] == 0){
				// Insertar la tabla en la BD
				$request = "INSERT INTO sponsor (name, url, description) VALUES ('$_POST[name]', '$_POST[url]', '$_POST[description]')";
				$result = mysqli_query($connect, $request);

				// Saber el ID de la tabla insertada
				$request = "SELECT id FROM sponsor WHERE name = '$_POST[name]'";
				$result = mysqli_query($connect, $request);
				$row = mysqli_fetch_assoc($result);

				// Unir players en una cadena de texto
				$SQLtournaments = "";
				for( $i = 0; $i < count($_POST['tournament']); $i++){
					$SQLtournaments .= "(".$_POST['tournament'][$i].", ".$row['id']."),";
				}
				$SQLtournaments = trim($SQLtournaments, ",");

				// Insertar los tournaments
				$request = "INSERT INTO tournament_sponsor (tournament_id, sponsor_id) VALUES $SQLtournaments";
				$result = mysqli_query($connect, $request);

				echo "success";
			}else{
				echo "This sponsor already exist";
			}

		}else{
			$request = "UPDATE sponsor SET name = '$_POST[name]', url = '$_POST[url]', description ='$_POST[description]' WHERE id = $_POST[id]";
			$result = mysqli_query($connect, $request);

			if( isset($_POST['tournament'] )){
				$request = "DELETE FROM tournament_sponsor WHERE sponsor_id = $_POST[id]";
				$result = mysqli_query($connect, $request);

				$SQLtournament = "";
				for( $i = 0; $i < count($_POST['tournament']); $i++){
					$SQLtournament .= "(".$_POST['id'].", ".$_POST['tournament'][$i]."),";
				}
				$SQLtournament = trim($SQLtournament, ",");

				// Insertar los sponsors
				$request = "INSERT INTO tournament_sponsor (sponsor_id, tournament_id) VALUES $SQLtournament";
				$result = mysqli_query($connect, $request);
			}
			
			echo "success";
		}
	}
}

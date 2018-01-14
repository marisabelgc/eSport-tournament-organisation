<?php
require ('../connect.php');
global $connect;

if( 
	isset($_POST['email']) && 
	isset($_POST['new_password1']) && 
	isset($_POST['new_password2']))
{
	// Verificar el email esta en uso
	$request = "SELECT COUNT(id) FROM user WHERE email='$_POST[email]'";
	$result = mysqli_query($connect, $request);
	$row = $result->fetch_row();
	if( $row[0] != 0){
		echo "That email is already in use.";

	}else if( $_POST['new_password1'] != $_POST['new_password2'] ){
		//Verificar si las contraseñas coinciden
		echo "Your passwords don't match";

	}else if( strlen( $_POST['new_password1'] ) < 6 || strlen( $_POST['new_password1'] ) > 28){
		//Verificar si las contraseñas tienen el num correcto de caracteres
		echo "Your password must has more than 6 characters";
	}else{		
		// Insertar la tabla en la BD
		$request = "INSERT INTO user (email, password) 
		VALUES ('$_POST[email]', '$_POST[new_password1]')";
		$result = mysqli_query($connect, $request);

		if($result){
			echo "INSERCCION DE USER <br>";
		}else{
			echo "INSERCCION DE USER FALLIDA <br>";
		}		
	}
}

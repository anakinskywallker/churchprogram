<?php 
		function conexion()  {
			$servidor="mysql.gestionplus.co";
			$usuario="adminplus";
			$password="hH75dWoe9f";
			$bd="gestionplusbd";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);

			return $conexion;
		}
 ?>
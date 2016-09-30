<?php

class db{
     
     public $conexion;
	public function conectar(){

		$conexion = new PDO('mysql:host=localhost;dbname=ajax','root','');
		return $conexion;

	}
}
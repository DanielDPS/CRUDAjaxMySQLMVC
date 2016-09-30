<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/crud.js"></script>
</head>
<body>


<div class="modulocrud">
	<h2>CRUD AJAX</h2>
  <table>

  <tr>
  	<td>Id</td>
  	<td>:</td>
  	<td><input type="text"  name="Id" disabled="disable"></td>
  </tr>

  <tr>
  	<td>Nombre</td>
  	<td>:</td>
  	<td><input type="text" name="Nombre" placeholder="Ingrese su nombre"></td>
  </tr>

  <tr>

  <td></td>
  <td></td>
  <td><button type="button" onclick="create()">Insertar</button>

  <button type="button" onclick="update()">Actualizar</button> 


  <button type="button" onclick="deleteuser()">Eliminar</button>

  </td>
  	
  </tr>

  <tr>
    <td></td>
    <td></td>
    <td >
     <div id="errorMensaje"></div>
    </td>
  </tr>
	

</table>
</div>



<div class="modulomostrar">
<h2>Usuarios</h2>
<table>

<thead>
	<th>Id</th>
	<th>Nombre</th>
	<th>Opción</th>
</thead>
	

	<tbody class="usuarios">

  
	</tbody>
     
</table>
	


</div>



</body>
</html>
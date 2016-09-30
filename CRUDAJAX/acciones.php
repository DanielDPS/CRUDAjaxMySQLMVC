<?php
include("db/db.php");
include("models/usermodel.php");
$user= new usermodel();
$acc=$_GET['accion'];
if ($acc=="show") {
    $user->showAll();
}      
 else if ($acc =="showuser") {
    $user->showUser();
}
else if ($acc =="create") {
	$user->create();
}
else if($acc =="update"){
	$user->update();
}
else if($acc=="delete")
{
	$user->delete();
}

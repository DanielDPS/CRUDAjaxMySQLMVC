<?php
class usermodel {
   public $db ;
   public $todos;
   public $id;
   public $name;
   public $query;

   public function __construct(){
   	$this->db =db::conectar();
   	$this->todos=array();
   }

   function id(){
      return $this->id= $_POST["Id"];
   }
   function name(){
      return $this->name=$_POST["Nombre"];
   }

   public function showAll(){
   $this->query = $this->db->query("select * from ejemplo");
   $this->query->execute();
      foreach($this->query->fetchAll() as $row)
   {
   	$this->todos[]= $row;
   }
 
    echo json_encode($this->todos);
   }
    

   public function showUser()
   {

      $this->query  = $this->db->prepare("select * from ejemplo where Id= ".$this->id());
      $this->query->execute();
      $this->todos = $this->query->fetch();
      echo json_encode($this->todos);
   }

   public function create(){

      
      
      $res["mensaje"]= "";
      if ($this->name() == "") {
         $res["mensaje"]= "Ingresa por favor tu nombre";
      }
      else {
         $this->query = $this->db->prepare("insert into ejemplo (Nombre) values ('".$this->name()."')");
          if ($this->query->execute()) {
             $res["mensaje"]= "Se ha insertado correctamente";
          }else {

            $res["mensaje"]= "Error al intentar insertar";
          }


      }
      echo json_encode($res);
   }

   public function update()
   {
   
    
      $res["mensaje"]= "";
      if ($this->name() == "") {
         $res["mensaje"]= "Ingresa por favor tu nombre";
      }
      else {
          $this->query = $this->db->prepare("update ejemplo set Nombre='".$this->name()."' where Id=".$this->id());
          if ($this->query->execute()) {
             $res["mensaje"]= "Se ha actualizado correctamente";
          }else {

            $res["mensaje"]= "Error al intentar actualizar";
          }


      }
      echo json_encode($res);

   }


   public function delete(){
      $this->query = $this->db->prepare("delete from ejemplo where Id=".$this->id());
      $this->query->execute();
   }




}
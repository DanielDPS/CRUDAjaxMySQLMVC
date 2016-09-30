
$(document).ready(function(){

  showallusers();
	
})

	function showallusers(){

    	var tr = $(".usuarios");
		tr.html("");
		$.ajax({
			type:"GET",
			data:"",
			url:"acciones.php?accion=show",
			success:function(res)
			{
				var objeto = JSON.parse(res);
				$.each(objeto,function(key,val){
                   var nuevafila = $("<tr>");
                   nuevafila.html("<td>"+val.Id+"</td> <td>"+val.Nombre+"</td><td> <button id="+val.Id+" class='btn-sm' >Ver</button></td>");
                   tr.append(nuevafila);
				})
			}
		})

	}
	$(document).on('click','.btn-sm',function(){
   var id = $(this).attr("id");
   $.ajax({

      type:"POST",
      data:"Id="+id,
      url:"acciones.php?accion=showuser",
      success:function(res){

         var objeto = JSON.parse(res);
         
          $("[name='Nombre']").val(objeto.Nombre);
          $("[name='Id']").val(objeto.Id);

      }
   })
})

function create(){
     var  nombre = $("[name='Nombre']").val();
    
	$.ajax({
		type:"POST",
		data:"Nombre="+nombre,
		url:"acciones.php?accion=create",
		success:function(res){

			var objeto = JSON.parse(res);
			$("#errorMensaje").html(objeto.mensaje);
			showallusers();
			 $("[name='Id']").val("");
       		$("[name='Nombre']").val("");


		}
	})
}

function update(){
	     var id =  $("[name='Id']").val();
	     var  nombre = $("[name='Nombre']").val();
    
	$.ajax({
		type:"POST",
		data:"Id="+id+"&Nombre="+nombre,
		url:"acciones.php?accion=update",
		success:function(res){

			var objeto = JSON.parse(res);
			$("#errorMensaje").html(objeto.mensaje);
			showallusers();



		}
	})
}

function deleteuser(){
       var id =  $("[name='Id']").val();
       var nombre =  $("[name='Nombre']").val();


       var pregunta  = confirm("Seguro que desea eliminar a "+nombre+" ?");
	       if (pregunta ==true) {
	        $.ajax({

	       	type:"POST",
	       	data:"Id="+id,
	       	url:"acciones.php?accion=delete",
	       	success:function(res)
	       	{
	       		showallusers();
	       		$("[name='Id']").val("");
	       		$("[name='Nombre']").val("");


	       	}
	       })
       }

     

}
var idetramite;

function mostrarTramites(id, usuario){ 
    cadena="id=" + id +
	"&nus=" + usuario;
	console.log("numero de consultar tramite");
             $.ajax({
			 type:"POST",
			 url:"php/mostrarTramites.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
				    alertify.success("Listo!");
					$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
        $('#tabla_tramites').load('tablas/tabla_tramites.php'); 
        $('#tabla_datos_evento').load('tablas/tabla_datos_evento.php');
										               
				}else{
				 alert('Fallo el servicio');
                  
				}
			 }
		     });
}
function agregarComentario(usuario){

		var informacion = $('#infoadmin').val();
	
	var cadena = "informacion=" + informacion + "&usuario=" + usuario;
	
	$.ajax({
		type: "POST",
		url: "php/agregarinformacion.php",
		data: cadena,
		success: function(r) {
			if (r == 1) { 
			
				location.reload();  
				 $('#infoadmin').val("");
				 $('#informaciongeneral').load('tablas/informacion_general.php');
			} else {
				 alert("NO");
			}
		}	   
	});
	
}
function eliminariformacion(id) {

		cadena="id=" + id;
	
	 
				 $.ajax({
				 type:"POST",
				 url:"php/eliminarInformacion.php",
				 data:cadena,
				 success:function(r){
					if(r==1){	
						alertify.success("Listo!");	
						$('#informaciongeneral').load('tablas/informacion_general.php');
					}else{		
						alert("fallo");			
					   
					}
				 }
				 });
}

function creartramite() {
      
	tipomisa=$('#tipomisa').val();
	

	switch (tipomisa) {
		case "Particular":
			var id_tipo_ingreso = 1
		  break;
		case "Santisimo":
			var id_tipo_ingreso = 2
		  break;
		case "Oficio":
		  	var id_tipo_ingreso = 3
		  break;
		case "Oficio sin pago":
		  	 var id_tipo_ingreso = 18
		  break;
		default:
		  alert('seleccione un tipo de misa');
	  }

	
	  misa_nombreofrece=$('#misa_nombreofrece').val();
	  misa_lugar=$('#misa_lugar').val();
	  misa_fecha=$('#misa_fecha').val();
	  misa_hora=$('#misa_hora').val();
	  misa_intencion=$('#misa_intencion').val();
	  id_rubro = 1;
	  nombre_contacto=$('#nombre_contacto').val();
	  identificacion=$('#identificacion').val();
	  celular_contacto=$('#celular_contacto').val();

	cadena= "id_tipo_ingreso=" + id_tipo_ingreso +
	        "&id_rubro=" + id_rubro +
			"&misa_nombreofrece=" + misa_nombreofrece +
			"&nombre_contacto=" + nombre_contacto +
			"&identificacion=" + identificacion +
			"&celular_contacto=" + celular_contacto +
			"&misa_lugar=" + misa_lugar + 
			"&misa_fecha=" + misa_fecha +
			"&misa_hora=" + misa_hora +
			"&misa_intencion=" + misa_intencion;
				
		
			$.ajax({
				type:"POST",
				url:"php/agregartramite.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
					 }else{
						alert('listo :)');
						location.reload();
				   }
				}
				
			}
		   );				
}
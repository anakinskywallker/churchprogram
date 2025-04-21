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
function agregarcliente(){
		
		nombrecliente=$('#nombrecliente').val();
	    apellidocliente=$('#apellidocliente').val();		
	    tipocedula=$('#tipocedula').val();
	    epscl=$('#epscl').val();
	    rhcl=$('#rhcl').val();
	    estadocivil=$('#estadocivil').val();
		fechanaci=$('#fechanaci').val();
	    escolaridad=$('#escolaridad').val();
		municipio=$('#municipio').val();
		documento=$('#documento').val();
		barrio=$('#barrio').val();
		acudiente=$('#acudiente').val();
		madre=$('#madre').val();
		contacto1=$('#contacto1').val();
		contacto2=$('#contacto2').val();
		regimen=$('#regimen').val();

   		let nombre = nombrecliente.length;
		let apellido = apellidocliente.length;
		let cedula = documento.length;
		let mun = municipio.length;
		let br = barrio.length;
		let celular = contacto1.length;
        

		if(nombre > 1 && apellido > 1 && cedula > 3 && mun > 1 && br > 1 && celular > 1)
		{
		
    

		cadena= "nombrecliente=" + nombrecliente +
		"&apellidocliente=" + apellidocliente +
		"&tipocedula=" + tipocedula + 
		"&epscl=" + epscl +
		"&rhcl=" + rhcl +
		"&estadocivil=" + estadocivil +
		"&fechanaci=" + fechanaci +
		"&municipio=" + municipio +
		"&documento=" + documento +
		"&barrio=" + barrio +
		"&acudiente=" + acudiente +
		"&madre=" + madre +
		"&escolaridad=" + escolaridad +
		"&contacto1=" + contacto1 +
		"&regimen=" + regimen +
		"&contacto2=" + contacto2;
			  
				 $.ajax({
				 type:"POST",
				 url:"php/agregarcliente.php",
				 data:cadena,
				 success:function(r){
					if(r==1){
                        alertify.success("Listo!"); 
						$('#tabla_clientes').load('tablas/tabla_clientes.php'); 
                         location.reload();
                    }else{
                         alert("El cliente que desea registrar ya existe");
					 	 $('#tabla_clientes').load('tablas/tabla_clientes.php'); 
					}
				 }
				
	  });
     
	}else{
		alert('Faltan datos importantes');
	}

	
}
function agregarusuario(){ 
		
		
		
	nombrecliente=$('#nombrecliente').val();
	apellidocliente=$('#apellidocliente').val();
	tipousuario=$('#tipousuario').val();
	documento=$('#documento').val();
	salario=$('#salario').val();	
	nombreusuario=$('#nombreusuario').val();
	psw=$('#psw').val();

	cadena= "nombrecliente=" + nombrecliente +
	"&apellidocliente=" + apellidocliente +
	"&tipocedula=" + tipocedula + 
	"&epscl=" + epscl +
	"&rhcl=" + rhcl +
	"&estadocivil=" + estadocivil +
	"&fechanaci=" + fechanaci +
	"&municipio=" + municipio +
	"&documento=" + documento +
	"&barrio=" + barrio +
	"&acudiente=" + acudiente +
	"&madre=" + madre +
	"&escolaridad=" + escolaridad +
	"&contacto1=" + contacto1 +
	"&regimen=" + regimen +
	"&contacto2=" + contacto2;
		  
			 $.ajax({
			 type:"POST",
			 url:"php/agregarcliente.php",
			 data:cadena,
			 success:function(r){
				if(r==1){	
                    alertify.success("Listo!"); 	            	
					$('#tabla_clientes').load('tablas/tabla_usuarios.php');
					location.reload();					
				}else{				
					$('#tabla_clientes').load('tablas/tabla_usuarios.php');				  
				}
			 }			
  });

}
function limpiarModalUsuario(){
	
		$('#tipousuario').val("");
		$('#salario').val("");	
		$('#nombreusuario').val("");
		$('#psw').val("");
		$('#nombrecliente').val("");
	    $('#apellidocliente').val("");		
	    $('#tipocedula').val("");
	    $('#epscl').val("");
	    $('#rhcl').val("");
	    $('#estadocivil').val("");
		$('#fechanaci').val("");
	    $('#escolaridad').val("");
		$('#municipio').val("");
		$('#documento').val("");
		$('#barrio').val("");
		$('#acudiente').val("");
		$('#madre').val("");
		$('#contacto1').val("");
		$('#contacto2').val("");
		$('#regimen').val("");

}
function buscarcliente(cedula, usuario){
	
	cadena="cedula=" + cedula +	"&usuario=" + usuario;
	         $.ajax({
			 type:"POST",
			 url:"php/buscarcliente.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#ingresardatos').load('tablas/cargar_cliente.php');
                    
				}else{
				  
				}
			 }
		     });
}
function crearturno(usuario, idcliente){

	inputPago=$('#inputPago').val();
	inputPrecio=$('#inputPrecio').val();
	doc1=$('#inputDocumentos1').val();
	doc2=$('#inputDocumentos2').val();
	doc3=$('#inputDocumentos2').val();

    var pago = parseFloat(inputPago);
	var precio = parseFloat(inputPrecio);
    let precioNull = inputPrecio.length;
	
	flagvalores = 0;
	
	
	if (precio < pago) {alert("El valor del pago no puede ser mayor al precio del turno"); flagvalores = 1;}	
	if (idcliente == null || precioNull < 1 || pago < 0  || precio < 0  || flagvalores == 1 ) {alert("Aun no a seleccionado un cliente o falta completar valores ");
	}else{	
		
	cadena = "inputPago=" + inputPago +
	"&idcliente=" + idcliente +
	"&inputPrecio=" + inputPrecio +
	"&usuario=" + usuario + 
	"&inputDocu=" + window.url1 + 
	"&inputDocumen=" + window.url2 +
	"&inputDocumentos=" + window.url3; 

	$.ajax({
		type:"POST",
		url:"php/agregarturno.php",
		data:cadena,
		success:function(r){
		   if(r==1){
			   alert("Creaste un turno nuevo, se recomieda agregar al menos un tramite para este turno");
			   $('#informacionturno').load('tablas/informacion_turno.php'); 
			    
			 }else{
			   alert("Fallo el servidor :(");
		   }
		}
		});
	}	 
	
}
function terminarTurno(){
	alertify.confirm('Terminar tramite', '¿Esta seguro de terminar el tramite?', 
				  function(){	
								$('#informacionturno').load('tablas/infoturnonulo.php');
				  				$('#tabla_tramites_nuevo').load('tablas/tramitenulo.php');;
							 	$('#idcliente').val(" ");
							 }
                , function(){ alertify.error('Se cancelo')});

}
function creartramite(idcliente, tipotramite, idturno) {
      
	autorizacion=$('#autorizacion').val();

		if(autorizacion == "NO"){
		
			lugarAtrz=$('#lugarAtu').val();		
			percontrol="";
			observacion=$('#observacion').val();
			fechacontrol="";
			municipio="";
			requerimiento="";
			inputips=$('#inputips').val();
			tipoautorizacion="";

			cadena= "autorizacion=" + autorizacion +
			"&lugarAtrz=" + lugarAtrz +
			"&percontrol=" + percontrol + 
			"&observacion=" + observacion +
			"&fechacontrol=" + fechacontrol +
			"&municipio=" + municipio +
			"&idcliente=" + idcliente +
			"&tipotramite=" + tipotramite +
			"&idturno=" + idturno +
			"&requerimiento=" + requerimiento +
			"&tipoautorizacion=" + tipoautorizacion + 
			"&inputips=" + inputips;
			
			let aux_observacion = observacion.length;

			if(aux_observacion > 2  ){
				$.ajax({
					type:"POST",
					url:"php/agregartramite.php",
					data:cadena,
					success:function(r){
					   if(r==1){				   
                           
						   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
						   limpiarupdate();
                           location.reload();
						 }else{
						   alert("Fallo el servidor :(");
					   }
					}
					});
					alertify.success("Listo!");

			}else{
				alert('Faltan datos importantes');
			}
		}
		else if(autorizacion == "SI"){

			lugarAtrz="";		
			percontrol=$('#percontrol').val();
			observacion=$('#observacion').val();
			fechacontrol=$('#fechacontrol').val();
			municipio=$('#municipio').val();
			requerimiento=$('#requerimiento').val();
			inputips=$('#inputips').val();
			tipoautorizacion=$('#tipoautorizacion').val();

			cadena= "autorizacion=" + autorizacion +
			"&lugarAtrz=" + lugarAtrz +
			"&percontrol=" + percontrol + 
			"&observacion=" + observacion +
			"&fechacontrol=" + fechacontrol +
			"&municipio=" + municipio +
			"&idcliente=" + idcliente +
			"&tipotramite=" + tipotramite +
			"&idturno=" + idturno +
			"&requerimiento=" + requerimiento +
			"&tipoautorizacion=" + tipoautorizacion + 
			"&inputips=" + inputips;
			
			let aux_requerimiento = requerimiento.length;

			if(aux_requerimiento > 2 ){
				$.ajax({
					type:"POST",
					url:"php/agregartramite.php",
					data:cadena,
					success:function(r){
					   if(r==1){				   
						   location.reload();
						   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
						   limpiarupdate();
						 }else{
						   alert("Fallo el servidor :(");
					   }
					}
					});
					alertify.success("Listo!");
			}else{
				alert('Faltan datos importantes');
			}
		}

		
}
function creartramiteexam(idcliente, tipotramite, idturno) {

	observacion=$('#observacionexam').val();
	municipio=$('#municipioexam').val();
	requerimiento=$('#requerimientoexam').val();
	inputips=$('#inputipsexam').val();
	autorizacion="SI";
	
	cadena= "observacion=" + observacion +
	"&municipio=" + municipio +
	"&idcliente=" + idcliente +
	"&tipotramite=" + tipotramite +
	"&idturno=" + idturno +
	"&requerimiento=" + requerimiento +
	"&inputips=" + inputips;

	let aux_requerimiento = requerimiento.length;
	
	if(aux_requerimiento > 2 )
	{
		$.ajax({
			type:"POST",
			url:"php/agregartramite.php",
			data:cadena,
			success:function(r){
			   if(r==1){
                   location.reload();					   		   
				   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
				   $('#observacionexam').val("");
				   $('#requerimientoexam').val("");
				   limpiarupdate();                  
				   
				 }else{
				   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
			   }
			   alertify.success("Listo!");
			}
			});
			
			
	}
	else{
	alert('Faltan datos importantes');
	}		
}
function creartramitemed(idcliente, tipotramite, idturno) {

	observacion=$('#observacionmed').val();
	municipio=$('#municipiomed').val();
	requerimiento=$('#requerimientomed').val();
	inputips=$('#inputipsmed').val();
	autorizacion="SI";
	
	

	cadena= "observacion=" + observacion +
	"&municipio=" + municipio +
	"&idcliente=" + idcliente +
	"&tipotramite=" + tipotramite +
	"&idturno=" + idturno +
	"&requerimiento=" + requerimiento +
	"&inputips=" + inputips;

	let aux_requerimiento = requerimiento.length;
	
	if(aux_requerimiento > 2 )
	{
		$.ajax({
			type:"POST",
			url:"php/agregartramite.php",
			data:cadena,
			success:function(r){
			   if(r==1){	                  
                   location.reload();
                   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
				   $('#observacionmed').val("");
				   $('#requerimientomed').val("");
				   limpiarupdate();
				 }else{
				   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
			   }
			   alertify.success("Listo!");
			}
			});
	}
	else{
	alert('Faltan datos importantes');
	}		
}
function creartramiteotro(idcliente, tipotramite, idturno) {

	observacion=$('#observacionotr').val();
	municipio=$('#municipiootr').val();
	requerimiento=$('#requerimientootr').val();
	inputips="AUDIFARMA";
	autorizacion="SI";
	
	cadena= "observacion=" + observacion +
	"&municipio=" + municipio +
	"&idcliente=" + idcliente +
	"&tipotramite=" + tipotramite +
	"&idturno=" + idturno +
	"&requerimiento=" + requerimiento +
	"&inputips=" + inputips;

	let aux_requerimiento = requerimiento.length;
	
	if(aux_requerimiento > 2 )
	{
		$.ajax({
			type:"POST",
			url:"php/agregartramite.php",
			data:cadena,
			success:function(r){
			   if(r==1){
                   location.reload();				   
				   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
				   $('#observacionotr').val("");
				   $('#requerimientootr').val("");
				   limpiarupdate();
				 }else{
				   $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
			   }
			   alertify.success("Listo!");
			}
			});
	}
	else{
	alert('Faltan datos importantes');
	}		
}
function informarTramite(nombre_informado, usuario) {

	cadena="nombreinfo=" + nombre_informado + "&idetramite=" + window.idetramite + "&estado=5" + "&usuario=" + usuario;

	         $.ajax({
			 type:"POST",
			 url:"php/informar.php",
			 data:cadena,
			 success:function(r){
				if(r==1){					
				    alertify.success("Listo!");
					$('#nom_informado').val("");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
                    location.reload();
                    
				}else{
					alertify.success("Error!");
				}
			 }
		     });
}
function entregarTramite(usuario) {

	cadena="idetramite=" + window.idetramite + "&estado=8" + "&usuario=" + usuario;

	         $.ajax({
			 type:"POST",
			 url:"php/entregar.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
					$('#tabla_tramites_entregados').load('tablas/tabla_tramites_entregados.php');
					$('#tabla_tramites_entregados_gestor').load('tablas/tabla_tramites_entregados_gestor.php');
					$('#tabla_tramites_listos').load('tablas/tabla_tramites_listos.php'); 
					$('#tabla_tramites_listos_gestor').load('tablas/tabla_tramites_listos_gestor.php');
                    location.reload(); 
                    
				}else{
				   alert("Fallo Servicio");
				}
			 }
		     });
}
function gestionarTramite(usuario , tipo) {
  if(tipo == 1){
	var observacion=$('#observacionCita').val();

	nombreprofecional=$('#nombreprofecional').val();
	fechacita=$('#fechacita').val();
	var hora=$('#horacita').val();
	minutoscita=$('#minutoscita').val();

	var separado = hora.split(" "); // Utilizamos el espacio como separador
	var numero = separado[0]; // Obtenemos el número de la hora
	var periodo = separado[1]; // Obtenemos el período (am o pm)

	horacita = numero + ":" + minutoscita + " " + periodo;

  }else if(tipo == 2){
	var observacion=$('#observacionMed').val();
        horacita = "";
        nombreprofecional = "";
        fechacita = "";
  }
  else if(tipo == 3){
	var observacion=$('#observacionOtro').val();
	horacita = "";
	nombreprofecional = "";
        fechacita = "";
  }
 
	cadena="nombreprofecional=" + nombreprofecional + 
	"&idetramite=" + window.idetramite + 
	"&fechacita=" + fechacita +  
	"&horacita=" + horacita +
	"&observacion=" + observacion +
	"&estado=3" + 
	"&usuario=" + usuario;


	         $.ajax({
			 type:"POST",
			 url:"php/gestionar.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
                    $('#nombreprofecional').val("");
					$('#fechacita').val("");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
                    location.reload();
                    
				}else{
					alert("Fallo el servidor :(");
				}
			 }
		     });
}
function gestionarListaEspera(usuario) {

	
	fechaEspera=$('#fechaentregacita').val();
  
	cadena="idetramite=" + window.idetramite + 
	"&fechacita=" + fechaEspera +
	"&estado=9" +  
	"&usuario=" + usuario;
	
	         $.ajax({
			 type:"POST",
			 url:"php/gestionarListaEspera.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
                    location.reload();
                    
				}else{
					alert("Fallo el servidor :(");
				}
			 }
		     });
}

function gestionarExamenes(usuario) {

	var observacion=$('#observacionexam').val();	
	var ruta=$('#pdf-file').val();
	var rutaarchivo = ruta.replace("C:\\fakepath\\", "");
 
	cadena="rutaarchivo=" + rutaarchivo + 
	"&idetramite=" + window.idetramite +
	"&observacion=" + observacion +  
	"&estado=3" + 
	"&usuario=" + usuario;

	$.ajax({
		type:"POST",
		url:"php/gestionarDocumentos.php",
		data:cadena,
		success:function(r){
		   if(r==1){
			   
			   alertify.success("Listo!");
			   $('#tabla_tramites').load('tablas/tabla_tramites.php');
			   $('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
			   
		   }else{
			   alert("Fallo el servidor :(");
		   }
		}
		});
	
}
function gestionarOtros(usuario) {
	
	var ruta=$('#pdf-file_otro').val();
	var observacion=$('#observacionOtro').val();
	var rutaarchivo = ruta.replace("C:\\fakepath\\", "");
	
 
	cadena="rutaarchivo=" + rutaarchivo + 
	"&idetramite=" + window.idetramite +
	"&observacion=" + observacion +  
	"&estado=3" + 
	"&usuario=" + usuario;

	$.ajax({
		type:"POST",
		url:"php/gestionarDocumentos.php",
		data:cadena,
		success:function(r){
		   if(r==1){
			   
			   alertify.success("Listo!");
			   $('#tabla_tramites').load('tablas/tabla_tramites.php');
			   $('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
			   location.reload();
		   }else{
			   alert("Fallo el servidor :(");
		   }
		}
		});
	
}
function autorizarTramite(usuario) {

	
	percontrol=$('#percontrol').val();
	observacion=$('#observacion').val();
	fechacontrol=$('#fechacontrol').val();
	municipio=$('#municipio').val();
	requerimiento=$('#requerimiento').val();
	inputips=$('#inputips').val();
	tipoautorizacion=$('#tipoautorizacion').val();

	
	cadena="percontrol=" + percontrol +
	"&observacion=" + observacion + 
	"&fechacontrol=" + fechacontrol +	
	"&municipio=" + municipio +
	"&requerimiento=" + requerimiento +
	"&tipoautorizacion=" + tipoautorizacion +
	"&usuario=" + usuario +
	"&idetramite=" + window.idetramite +  
	"&inputips=" + inputips;

	let aux_requerimiento = requerimiento.length;

	if(aux_requerimiento > 2 ){
		$.ajax({
			type:"POST",
			url:"php/autorizar.php",
			data:cadena,
			success:function(r){
			   if(r==1){				   
				   alertify.success("Listo!");
				   $('#tabla_tramites').load('tablas/tabla_tramites.php');
				   $('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
				   limpiarupdate();
                   location.reload();
				 }else{
				   alert("Fallo el servidor :(");
			   }
			}
			});

	}else{
		alert('Faltan datos importantes');
	}
}
function eliminarTramite(usuario) {

	cadena="idetramite=" + window.idetramite + "&estado=6" + "&usuario=" + usuario;

 
	         $.ajax({
			 type:"POST",
			 url:"php/eliminarTramite.php",
			 data:cadena,
			 success:function(r){
				if(r==1){	
					alertify.success("Listo!");		
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
                    location.reload();
                }else{					
				   
				}
			 }
		     });
}
function ponerenEspera(usuario) {


	observacion=$('#observacionespera').val();

	cadena="idetramite=" + window.idetramite + 
	"&estado=4" + 
	"&observacion=" + observacion + 
	"&usuario=" + usuario;
 
	         $.ajax({
			 type:"POST",
			 url:"php/eliminarTramite.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
                    location.reload();
                    
				}else{
				   
				}
			 }
		     });
}
function quitarEspera(usuario){

	observacion=$('#observacionespera').val();

	cadena="idetramite=" + window.idetramite + 
	"&estado=2" + 
	"&observacion=" + observacion + 
	"&usuario=" + usuario;
 
	         $.ajax({
			 type:"POST",
			 url:"php/eliminarTramite.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
					$('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
                    location.reload();
                    
				}else{
				   
				}
			 }
		     });

}
function limpiarupdate(){
	
		$('#percontrol').val("");
		$('#observacion').val("");
		$('#fechacontrol').val("");
		$('#requerimiento').val("");
}
function agregaform(numero){
	
	window.idetramite = numero;
}
function guardarRutas(nombre1, nombre2, nombre3){

	const prefix = "";
		
		if(nombre1 == undefined ){
			ruta1 = "";
		}else{ ruta1 = prefix + nombre1; }
		if(nombre2 == undefined ){
			ruta2 = "";
		}else{ ruta2 = prefix + nombre2; }
		if(nombre3 == undefined ){
			ruta3 = "";
		}else{ ruta3 = prefix + nombre3; }

		window.url1 = ruta1;
		window.url2 = ruta2;
		window.url3 = ruta3;
		

}
function preguntarSiNoEliminar(usuario){    
	alertify.confirm('Eliminar Tramite', '¿Esta seguro de eliminar este Tramite?', 
					function(){ eliminarTramite(usuario); location.reload();}
                , function(){ alertify.error('Se cancelo')});
}
function preguntarSiNoPonerenespera(usuario){
	alertify.confirm('Poner tramite en espera', '¿Esta seguro de poner en espera este Tramite?', 
					function(){ ponerenEspera(usuario); location.reload();}
                , function(){ alertify.error('Se cancelo')});
}
function preguntarSiNoQuitarEspera(usuario){
	alertify.confirm('QUitar tramite de espera', '¿Esta seguro de quitar este tramite de espera?', 
					function(){ quitarEspera(usuario); location.reload();}
                , function(){ alertify.error('Se cancelo')});
}
function agregarColaborador(){
		
	
		
	nombre=$('#nombreColaborador').val();
	apellido=$('#apellidoColaborador').val();		
	tipousuario=$('#tipousuario').val();
	lugartrabajo=$('#lugartrabajo').val();
	documento=$('#documentoColaborador').val();
	contacto=$('#contacto').val();	
	salario=$('#salario').val();
	nombreUsuario=$('#nombreUsuario').val();
	psw=$('#psw').val();

	if (tipousuario == 'Administrador'){
		tipo_usuario = 1;
	}else{
		tipo_usuario = 2;
	}

	let nombreclienteAux = nombre.length;
	let apellidoclienteAux = apellido.length;
	let lugartrabajoAux = lugartrabajo.length;
	let nombreUsuarioAux = nombreUsuario.length;
	let pswAux = psw.length;
	

	if(lugartrabajoAux > 1 && nombreUsuarioAux > 1 && pswAux > 1 && apellidoclienteAux > 1 && nombreclienteAux > 1)
	{
	
	cadena= "nombre=" + nombre +
	"&apellido=" + apellido +
	"&tipousuario=" + tipo_usuario + 
	"&lugartrabajo=" + lugartrabajo +
	"&documento=" + documento +
	"&contacto=" + contacto +
	"&salario=" + salario +
	"&nombreUsuario=" + nombreUsuario +
	"&psw=" + psw;
		  
			 $.ajax({
			 type:"POST",
			 url:"php/agregarempleado.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					$('#nombreColaborador').val("");
					$('#apellidoColaborador').val("");		
					$('#tipousuario').val("");
	               			$('#lugartrabajo').val("");
					$('#documentoColaborador').val("");
					$('#contacto').val("");	
					$('#salario').val("");
					$('#nombreUsuario').val("");
					$('#psw').val("");
					alertify.success("Listo!");
					$('#tabla_usuarios').load('tablas/tabla_usuarios.php'); 
					
				}else{
					$('#tabla_usuarios').load('tablas/tabla_usuarios.php'); 
				}
			 }
			
  });
}else{
	alert('Faltan datos importantes');
}


}
function suspenderUsuario(id){

	
	cadena="id=" + id;
 
	         $.ajax({
			 type:"POST",
			 url:"php/suspenderUsuario.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#tabla_usuarios').load('tablas/tabla_usuarios.php');
                    
                    
				}else{
				   
				}
			 }
		     });


}
function preguntarSiNosuspenderUsuario(id){
	alertify.confirm('Suspender Usuario', '¿Esta seguro de suspender a esta usuario?', 
					function(){ suspenderUsuario(id); }
                , function(){ alertify.error('Se cancelo')});


}
function preguntarSiNocambioAutorizacion(usuario){
	alertify.confirm('Nueva Autorizacion', '¿Esta seguro de cambiar a nueva Autorizacion?', 
					function(){ nuevaAutorizacion(usuario); }
                , function(){ alertify.error('Se cancelo')});

}

function nuevaAutorizacion(usuario){

	observacion=$('#obacciones').val();

	cadena="idetramite=" + window.idetramite + 
	"&estado=7" + 
	"&observacion=" + observacion + 
	"&usuario=" + usuario;

 
	         $.ajax({
			 type:"POST",
			 url:"php/nuevaAutorizacion.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					
				    alertify.success("Listo!");
					$('#tabla_tramites').load('tablas/tabla_tramites.php');
                    location.reload();
                    
				}else{
				   
				}
			 }
		     });

}
function agregaformCliente(datos){

	d=datos.split('||');
	window.idcliente = d[0];       
    $('#mnombrecliente').val(d[1]);
	$('#mapellidocliente').val(d[2]);
	$('#mdocumento').val(d[4]);
	$('#mfechanaci').val(d[5]);
	$('#mmunicipio').val(d[9]);
	$('#mbarrio').val(d[10]);
	$('#mcontacto1').val(d[13]);
	$('#mrhcl').val(d[6]);
	$('#mestadocivil').val(d[7]);
	$('#mescolaridad').val(d[8]);
	$('#macudiente').val(d[11]);
	$('#mmadre').val(d[12]);
	$('#mcontacto2').val(d[14]);

}
function editarcliente(){

		mnombrecliente = $('#mnombrecliente').val();
		mapellidocliente = $('#mapellidocliente').val();
		mtipocedula = $('#mtipocedula').val();
		mepscl = $('#mepscl').val();
		mrhcl = $('#mrhcl').val();
		mestadocivil = $('#mestadocivil').val();
		mfechanaci = $('#mfechanaci').val();
		mescolaridad = $('#mescolaridad').val();
		mmunicipio = $('#mmunicipio').val();
		mdocumento = $('#mdocumento').val();
		mbarrio = $('#mbarrio').val();
		macudiente = $('#macudiente').val();
		mmadre = $('#mmadre').val();
		mcontacto1 = $('#mcontacto1').val();
		mcontacto2 = $('#mcontacto2').val();
		mregimen = $('#mregimen').val();
 
		cadena= "nombrecliente=" + mnombrecliente +
		"&apellidocliente=" + mapellidocliente +
		"&tipocedula=" + mtipocedula + 
		"&epscl=" + mepscl +
		"&rhcl=" + mrhcl +
		"&estadocivil=" + mestadocivil +
		"&fechanaci=" + mfechanaci +
		"&municipio=" + mmunicipio +
		"&documento=" + mdocumento +
		"&barrio=" + mbarrio +
		"&acudiente=" + macudiente +
		"&madre=" + mmadre +
		"&escolaridad=" + mescolaridad +
		"&contacto1=" + mcontacto1 +
		"&regimen=" + mregimen +
		"&contacto2=" + mcontacto2 +
		"&idcliente="+ window.idcliente;

		$.ajax({
			type:"POST",
			url:"php/editarcliente.php",
			data:cadena,
			success:function(r){
			   if(r==1){
				   alertify.success("Listo!");
				   $('#tabla_clientes').load('tablas/tabla_clientes.php'); 
                   location.reload();
				   
			   }else{
								 
					 $('#tabla_clientes').load('tablas/tabla_clientes.php'); 
				 
			   }
			}
		   
 		});
}
function pagarSaldoTramites(pago, id){

	cadena="id=" + id +
	"&pago=" + pago;

	         $.ajax({
			 type:"POST",
			 url:"php/pagarTurno.php",
			 data:cadena,
			 success:function(r){
				if(r==1){
					 alertify.success("Pago Registrado!");
					$('#tabla_turnos').load('tablas/tabla_turnos.php');
					$('#tabla_turnos_listos').load('tablas/tabla_turnos_listos.php');
					$('#tabla_turnos_gestor').load('tablas/tabla_turnos_gestor.php');
					$('#tabla_turnos_listos_gestor').load('tablas/tabla_turnos_listos_gestor.php'); 
					$('#tabla_turnos_pendientes').load('tablas/tabla_turnos_pendientes.php');
                    
				}else{
				  
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
        
            alert("listo");
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
					alert("listo");		
					$('#informaciongeneral').load('tablas/informacion_general.php');
                }else{		
					alert("fallo");			
				   
				}
			 }
		     });
}
function actualizartabla() {

	$('#tabla_turnos_pagos').load('tablas/tabla_turnos_pagos.php');
	alertify.success("Listo!");
}

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
        			$('#tabla_datos_misa').load('tablas/tabla_datos_misa.php');
       				$('#tabla_datos_evento').load('tablas/tabla_datos_evento.php');
					$('#tabla_facturasdiario').load('tablas/tabla_facturasdiario.php');
					$('#tabla_abonos').load('tablas/tabla_abonos.php'); 
										               
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
	
    var flag = 0;
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
			flag = 1;
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
				
		if(flag == 0){
			$.ajax({
				type:"POST",
				url:"php/agregarmisa.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );	
		}else{
			alert('Faltan datos importantes');
		}			
}
function agregarentierro() {

	ent_tipo_exequia=$('#ent_tipo_exequia').val();

	switch (ent_tipo_exequia) {
		case "Urbana":
			var id_tipo_ingreso = 4
		  break;
		case "Rural":
			var id_tipo_ingreso = 5
		  break;
		default:
		  alert('seleccione un tipo de misa');
	  }
      
	ent_nombre_difunto=$('#ent_nombre_difunto').val();
	
	id_rubro = 1;	
	ent_fecha_muerte=$('#ent_fecha_muerte').val();
	ent_edad=$('#ent_edad').val();
	ent_fecha_misa=$('#ent_fecha_misa').val();
	ent_hora_misa=$('#ent_hora_misa').val();
	ent_lugar_del_funeral=$('#ent_lugar_del_funeral').val();
	ent_nombre_padre=$('#ent_nombre_padre').val();
	ent_nombre_madre=$('#ent_nombre_madre').val();
	ent_causa_de_muerte=$('#ent_causa_de_muerte').val();
	ent_estado_civil=$('#ent_estado_civil').val();
	ent_nombre_conyugue=$('#ent_nombre_conyugue').val();
	ent_nombre_hijos=$('#ent_nombre_hijos').val();
	ent_ultimos_sacramentos=$('#ent_ultimos_sacramentos').val();
	ent_telefono= "" 
	//$('#ent_telefono').val();
	ent_biografia=$('#ent_biografia').val();
	ent_nombre_contacto=$('#ent_nombre_contacto').val();
	ent_identificacion=$('#ent_identificacion').val();
	ent_celular_contacto=$('#ent_celular_contacto').val();

	cadena= "ent_nombre_difunto=" + ent_nombre_difunto +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&id_rubro=" + id_rubro +
			"&ent_fecha_muerte=" + ent_fecha_muerte +
			"&ent_edad=" + ent_edad +
			"&ent_fecha_misa=" + ent_fecha_misa +
			"&ent_hora_misa=" + ent_hora_misa +
			"&ent_lugar_del_funeral=" + ent_lugar_del_funeral +
			"&ent_nombre_padre=" + ent_nombre_padre +
			"&ent_nombre_madre=" + ent_nombre_madre + 
			"&ent_causa_de_muerte=" + ent_causa_de_muerte + 
			"&ent_estado_civil=" + ent_estado_civil + 
			"&ent_nombre_conyugue=" + ent_nombre_conyugue +
			"&ent_nombre_hijos=" + ent_nombre_hijos + 
			"&ent_ultimos_sacramentos=" + ent_ultimos_sacramentos +  
			"&ent_telefono=" + ent_telefono +
			"&ent_biografia=" + ent_biografia +
			"&ent_nombre_contacto=" + ent_nombre_contacto +
			"&ent_identificacion=" + ent_identificacion +
			"&ent_celular_contacto=" + ent_celular_contacto;
			
		let nombre = ent_nombre_difunto.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarentierro.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarresponso() {

	res_tipo_responso=$('#res_tipo_responso').val();

	switch (res_tipo_responso) {
		case "Normal":
			var id_tipo_ingreso = 6
		  break;
		case "Semana Santa":
			var id_tipo_ingreso = 7
		  break;
		default:
		  alert('seleccione un tipo de responso');
	  }
      id_rubro = 1;
	res_nombre_ofrece=$('#res_nombre_ofrece').val();
	res_lugar=$('#res_lugar').val();
	res_fecha=$('#res_fecha').val();
	res_hora=$('#res_hora').val();
	res_intencion=$('#res_intencion').val();
	res_nombre_contacto=$('#res_nombre_contacto').val();
	res_identificacion=$('#res_identificacion').val();
	res_celular_contacto=$('#res_celular_contacto').val();
	

	cadena= "id_tipo_ingreso=" + id_tipo_ingreso +
			"&id_rubro=" + id_rubro +
	        "&res_nombre_ofrece=" + res_nombre_ofrece +
			"&res_lugar=" + res_lugar +
			"&res_fecha=" + res_fecha +
			"&res_hora=" + res_hora +
			"&res_intencion=" + res_intencion +
			"&res_nombre_contacto=" + res_nombre_contacto +
			"&res_identificacion=" + res_identificacion +
			"&res_celular_contacto=" + res_celular_contacto;
  
		let nombre = res_nombre_ofrece.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarresponso.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarbolbautizo() {
	id_rubro = 1;	
	id_tipo_ingreso = 8;
	bol_ba_nombre_y_apellido=$('#bol_ba_nombre_y_apellido').val();
	bol_ba_lugar_nacimiento=$('#bol_ba_lugar_nacimiento').val();
	bol_ba_fecha_nacimiento=$('#bol_ba_fecha_nacimiento').val();
	bol_ba_nombre_padre=$('#bol_ba_nombre_padre').val();
	bol_ba_nombre_madre=$('#bol_ba_nombre_madre').val();
	bol_ba_nombre_padrino=$('#bol_ba_nombre_padrino').val();
	bol_ba_nombre_madrina=$('#bol_ba_nombre_madrina').val();
	bol_ba_abuelos_paternos=$('#bol_ba_abuelos_paternos').val();
	bol_ba_abuelos_maternos=$('#bol_ba_abuelos_maternos').val();
	bol_ba_ministro_bautizo=$('#bol_ba_ministro_bautizo').val();
	bol_ba_recibido=$('#bol_ba_recibido').val();
	bol_ba_identificacion=$('#bol_ba_identificacion').val();
	bol_ba_celular=$('#bol_ba_celular').val();
	

	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&bol_ba_nombre_y_apellido=" + bol_ba_nombre_y_apellido +
			"&bol_ba_lugar_nacimiento=" + bol_ba_lugar_nacimiento +
			"&bol_ba_fecha_nacimiento=" + bol_ba_fecha_nacimiento +
			"&bol_ba_nombre_padre=" + bol_ba_nombre_padre +
			"&bol_ba_nombre_madre=" + bol_ba_nombre_madre +
			"&bol_ba_nombre_padrino=" + bol_ba_nombre_padrino +
			"&bol_ba_nombre_madrina=" + bol_ba_nombre_madrina +
			"&bol_ba_abuelos_paternos=" + bol_ba_abuelos_paternos + 
			"&bol_ba_abuelos_maternos=" + bol_ba_abuelos_maternos + 
			"&bol_ba_ministro_bautizo=" + bol_ba_ministro_bautizo + 
			"&bol_ba_recibido=" + bol_ba_recibido +
			"&bol_ba_identificacion=" + bol_ba_identificacion + 
			"&ent_ultimos_sacramentos=" + ent_ultimos_sacramentos +  
			"&bol_ba_celular=" + bol_ba_celular;
			
		let nombre = bol_ba_nombre_y_apellido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarbolbautizo.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarbolprimera() {
	id_rubro = 1;	
	id_tipo_ingreso = 9;
	bol_pri_nombre_y_apellido=$('#bol_pri_nombre_y_apellido').val();
	bol_pri_lugar_nacimiento=$('#bol_pri_lugar_nacimiento').val();
	bol_pri_fecha_nacimiento=$('#bol_pri_fecha_nacimiento').val();
	bol_pri_nombre_padre=$('#bol_pri_nombre_padre').val();
	bol_pri_nombre_madre=$('#bol_pri_nombre_madre').val();
	bol_pri_nombre_padrino=$('#bol_pri_nombre_padrino').val();
	bol_pri_nombre_madrina=$('#bol_pri_nombre_madrina').val();
	bol_pri_ministro=$('#bol_pri_ministro').val();
	bol_pri_recibido=$('#bol_pri_recibido').val();
	bol_pri_identificacion=$('#bol_pri_identificacion').val();
	bol_pri_celular=$('#bol_pri_celular').val();

	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&bol_pri_nombre_y_apellido=" + bol_pri_nombre_y_apellido +
			"&bol_pri_lugar_nacimiento=" + bol_pri_lugar_nacimiento +
			"&bol_pri_fecha_nacimiento=" + bol_pri_fecha_nacimiento +
			"&bol_pri_nombre_padre=" + bol_pri_nombre_padre +
			"&bol_pri_nombre_madre=" + bol_pri_nombre_madre +
			"&bol_pri_nombre_padrino=" + bol_pri_nombre_padrino +
			"&bol_pri_nombre_madrina=" + bol_pri_nombre_madrina +
			"&bol_pri_ministro=" + bol_pri_ministro +
			"&bol_pri_recibido=" + bol_pri_recibido +
			"&bol_pri_identificacion=" + bol_pri_identificacion +
			"&bol_pri_celular=" + bol_pri_celular;
			
		let nombre = bol_pri_nombre_y_apellido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarbolprimera.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarbolconfirma() {
	id_rubro = 1;	
	id_tipo_ingreso = 10;
	bol_con_parroquia=$('#bol_con_parroquia').val();
	bol_con_nombre_y_apellido=$('#bol_con_nombre_y_apellido').val();
	bol_con_lugar_bautizo=$('#bol_con_lugar_bautizo').val();
	bol_con_fecha_bautismo=$('#bol_con_fecha_bautismo').val();
	bol_con_bautismo_libro=$('#bol_con_bautismo_libro').val();
	bol_con_fecha_confirmacion=$('#bol_con_fecha_confirmacion').val();
	bol_con_nombre_padre=$('#bol_con_nombre_padre').val();
	bol_con_nombre_madre=$('#bol_con_nombre_madre').val();
	bol_con_ministro=$('#bol_con_ministro').val();
	bol_con_recibido=$('#bol_con_recibido').val();
	bol_con_identificacion=$('#bol_con_identificacion').val();
	bol_con_celular=$('#bol_con_celular').val();

	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&bol_con_parroquia=" + bol_con_parroquia +
			"&bol_con_nombre_y_apellido=" + bol_con_nombre_y_apellido +
			"&bol_con_lugar_bautizo=" + bol_con_lugar_bautizo +
			"&bol_con_fecha_bautismo=" + bol_con_fecha_bautismo +
			"&bol_con_bautismo_libro=" + bol_con_bautismo_libro +
			"&bol_con_fecha_confirmacion=" + bol_con_fecha_confirmacion +
			"&bol_con_nombre_padre=" + bol_con_nombre_padre +
			"&bol_con_nombre_madre=" + bol_con_nombre_madre + 
			"&bol_con_ministro=" + bol_con_ministro + 
			"&bol_con_recibido=" + bol_con_recibido + 
			"&bol_con_identificacion=" + bol_con_identificacion + 
			"&bol_con_celular=" + bol_con_celular;
			
		let nombre = bol_con_nombre_y_apellido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarbolconfirma.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function descargarTablaPDF() {
	alert('here');
    const tabla = document.getElementById('datosaimprimir');
    
    html2canvas(tabla).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF();
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save("tabla.pdf");
    });
}
function agregarpartidas() {

	partida_tipo=$('#partida_tipo').val();
	
	switch (partida_tipo) {
		case "Bautismo":
			var id_tipo_ingreso = 12
		  break;
		case "Bautismo sacramento":
			var id_tipo_ingreso = 13
		  break;
		case "Confirmacion":
		  	var id_tipo_ingreso = 14
		  break;
		case "Matrimonio":
		  	var id_tipo_ingreso = 15
		  break;
		case "Defunción":
		  	 var id_tipo_ingreso = 16
		  break;
		case "Partida Vieja":
		  	 var id_tipo_ingreso = 17
		  break;
		default:
		  alert('seleccione un tipo de misa');
	  }
	id_rubro = 1;	
	partida_observacion=$('#partida_observacion').val();
	partida_recibido=$('#partida_recibido').val();
	partida_identificacion=$('#partida_identificacion').val();
	partida_con_celular=$('#partida_con_celular').val();
	

	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&partida_observacion=" + partida_observacion +
			"&partida_recibido=" + partida_recibido +
			"&partida_identificacion=" + partida_identificacion +
			"&partida_con_celular=" + partida_con_celular;
			
		let nombre = partida_recibido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarpartida.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarotros() {

	otros_tipo=$('#otros_tipo').val();
	switch (otros_tipo) {
		case "Locales parroquiales":
			var id_rubro = 2
		  break;
		case "Ofrendas parroquiales":
			var id_rubro = 4
		  break;
		case "Tienda":
			var id_rubro = 6
		  break;
		case "Otros Ingresos":
			var id_rubro = 3
			break;
		default:
		  alert('seleccione un tipo de rubro');
	  }
	
	otros_recibido=$('#otros_recibido').val();
	otros_cedula=$('#otros_cedula').val();
	otros_ofrenda=$('#otros_ofrenda').val();
	otros_observacion=$('#otros_observacion').val();
	otros_celular=$('#otros_celular').val();
	otros_ciudad=$('#otros_ciudad').val();

	

	cadena= "id_rubro=" + id_rubro +
			"&otros_tipo=" + otros_tipo +
	        "&otros_recibido=" + otros_recibido +
			"&otros_cedula=" + otros_cedula +
			"&otros_ofrenda=" + otros_ofrenda +
			"&otros_observacion=" + otros_observacion +
			"&otros_celular=" + otros_celular +
			"&otros_ciudad=" + otros_ciudad;
		let nombre = otros_tipo.length;
		let valores = otros_ofrenda.length;
		if(nombre > 1 &&  valores > 2)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarotros.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarcem() {

	cem_tipo=$('#cem_tipo').val();
	switch (cem_tipo) {
		case "Osarios":
			var id_tipo_ingreso = 21
		  break;
		case "Bovedas":
			var id_tipo_ingreso = 22
		  break;
		default:
		  alert('seleccione un tipo de rubro');
	  }
	id_rubro = 5;
	cem_recibido=$('#cem_recibido').val();
	cem_cedula=$('#cem_cedula').val();
	cem_observacion=$('#cem_observacion').val();
	cem_celular=$('#cem_celular').val();
	cem_ciudad=$('#cem_ciudad').val();
	cem_nomtip='Cementerio';		

	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&cem_recibido=" + cem_recibido +
			"&cem_cedula=" + cem_cedula +
			"&cem_observacion=" + cem_observacion +
			"&cem_celular=" + cem_celular +
			"&cem_ciudad=" + cem_ciudad +
			"&cem_nomtip=" + cem_nomtip;
		let nombre = cem_recibido.length;
		let valores = cem_cedula.length;
		
		if(nombre > 1 &&  valores > 2)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarcem.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function agregarcemabon() {	

	cem_tipo=$('#cem_tipo_abon').val();
	switch (cem_tipo) {
		case "Osarios plazos":
			var id_tipo_ingreso = 23
		  break;
		case "Bovedas plazos":
			var id_tipo_ingreso = 24
		  break;
		default:
		  alert('seleccione un tipo de rubro');
	  }
	id_rubro = 5;
	cem_recibido=$('#cem_recibido_abon').val();
	cem_cedula=$('#cem_cedula_abon').val();
	cem_observacion=$('#cem_observacion_abon').val();
	cem_celular=$('#cem_celular_abon').val();
	cem_ciudad=$('#cem_ciudad_abon').val();
	cem_ofrenda=$('#cem_ofrenda_abon').val();
	cem_nomtip='Cementerio';		
 
	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&cem_recibido=" + cem_recibido +
			"&cem_cedula=" + cem_cedula +
			"&cem_observacion=" + cem_observacion +
			"&cem_celular=" + cem_celular +
			"&cem_ciudad=" + cem_ciudad +
			"&cem_ofrenda=" + cem_ofrenda +
			"&cem_nomtip=" + cem_nomtip;
		let nombre = cem_recibido.length;
		let valores = cem_cedula.length;
		
		if(nombre > 1 &&  valores > 2)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregarcemabon.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}
}
function agregaregreso() {

	egreso_tipo=$('#egreso_tipo').val();
	switch (egreso_tipo) {
		case "Talento humano":
			var id_tipo_egreso = 1
		  break;
		case "Servicios publicos":
			var id_tipo_egreso = 2
		  break;
		case "Diosesis de Pasto":
			var id_tipo_egreso = 3
		  break;
		case "Vehiculo parroquial":
			var id_tipo_egreso = 4
		  break;
		case "Templo Parroquial":
			var id_tipo_egreso = 5
		  break;
		case "Casa Cural":
			var id_tipo_egreso = 6
		  break;
		case "Despacho":
			var id_tipo_egreso = 7
		  break;
		case "Otros egresos":
			var id_tipo_egreso = 8
		  break;
		default:
		  alert('seleccione un tipo de egreso');
	  }

	egreso_nombreapellido=$('#egreso_nombreapellido').val();
	egreso_cedula=$('#egreso_cedula').val();
	egreso_celular=$('#egreso_celular').val();
	egreso_observacion=$('#egreso_observacion').val();
	egreso_valor=$('#egreso_valor').val();	

			cadena = "id_tipo_egreso=" + id_tipo_egreso +
    "&egreso_nombreapellido=" + egreso_nombreapellido +
    "&egreso_cedula=" + egreso_cedula +
    "&egreso_celular=" + egreso_celular +
    "&egreso_observacion=" + egreso_observacion +
    "&egreso_valor=" + egreso_valor;

		let nombre = egreso_nombreapellido.length;
		let valores = egreso_valor.length;
		
		
		if(nombre > 1 &&  valores > 2)
		{			
			$.ajax({
				type:"POST",
				url:"php/agregaregreso.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						alert('listo :)');
						location.reload();
						$('#tabla_egresos').load('tablas/tabla_egresos.php'); 
					 }else{
						alert('listo :)');
						location.reload();
						$('#tabla_egresos').load('tablas/tabla_egresos.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function regagregarbautizo() {
	
id_tipo_ingreso = 8;
reg_ba_nombre_y_apellido = $('#reg_ba_nombre_y_apellido').val();
reg_ba_lugar_nacimiento = $('#reg_ba_lugar_nacimiento').val();
reg_ba_fecha_nacimiento = $('#reg_ba_fecha_nacimiento').val();
reg_ba_nombre_padre = $('#reg_ba_nombre_padre').val();
reg_ba_nombre_madre = $('#reg_ba_nombre_madre').val();
reg_ba_nombre_padrino = $('#reg_ba_nombre_padrino').val();
reg_ba_nombre_madrina = $('#reg_ba_nombre_madrina').val();
reg_ba_abuelos_paternos = $('#reg_ba_abuelos_paternos').val();
reg_ba_abuelos_maternos = $('#reg_ba_abuelos_maternos').val();
reg_ba_ministro_bautizo = $('#reg_ba_ministro_bautizo').val();
reg_ba_libro = $('#reg_ba_libro').val();
reg_ba_folio = $('#reg_ba_folio').val();
reg_ba_numero_reg = $('#reg_ba_numero_reg').val();


cadena = "id_tipo_ingreso=" + id_tipo_ingreso +
         "&reg_ba_nombre_y_apellido=" + reg_ba_nombre_y_apellido +
         "&reg_ba_lugar_nacimiento=" + reg_ba_lugar_nacimiento +
         "&reg_ba_fecha_nacimiento=" + reg_ba_fecha_nacimiento +
         "&reg_ba_nombre_padre=" + reg_ba_nombre_padre +
         "&reg_ba_nombre_madre=" + reg_ba_nombre_madre +
         "&reg_ba_nombre_padrino=" + reg_ba_nombre_padrino +
         "&reg_ba_nombre_madrina=" + reg_ba_nombre_madrina +
         "&reg_ba_abuelos_paternos=" + reg_ba_abuelos_paternos + 
         "&reg_ba_abuelos_maternos=" + reg_ba_abuelos_maternos + 
         "&reg_ba_ministro_bautizo=" + reg_ba_ministro_bautizo +
         "&reg_ba_libro=" + reg_ba_libro +
         "&reg_ba_folio=" + reg_ba_folio +
         "&reg_ba_numero_reg=" + reg_ba_numero_reg;


	    let nombre = reg_ba_nombre_y_apellido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/regagregarbautizo.php",
				data:cadena,
				success:function(r){
				   if(r==1){
						alertify.success("Listo!");
						$('#tabla_registro').load('tablas/tabla_registro.php');
						location.reload();
					 }else{
						alertify.error("Error!");
						$('#tabla_registro').load('tablas/tabla_registro.php');
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function regagregarprimera() {
	
id_tipo_ingreso = 9;
reg_pri_nombre_y_apellido = $('#reg_pri_nombre_y_apellido').val();
reg_pri_lugar_nacimiento = $('#reg_pri_lugar_nacimiento').val();
reg_pri_fecha_nacimiento = $('#reg_pri_fecha_nacimiento').val();
reg_pri_nombre_padre = $('#reg_pri_nombre_padre').val();
reg_pri_nombre_madre = $('#reg_pri_nombre_madre').val();
reg_pri_nombre_padrino = $('#reg_pri_nombre_padrino').val();
reg_pri_nombre_madrina = $('#reg_pri_nombre_madrina').val();
reg_pri_libro = $('#reg_pri_libro').val();
reg_pri_folio = $('#reg_pri_folio').val();
reg_pri_numero_reg = $('#reg_pri_numero_reg').val();
reg_pri_ministro = $('#reg_pri_ministro').val();

cadena = "id_tipo_ingreso=" + id_tipo_ingreso +
         "&reg_pri_nombre_y_apellido=" + reg_pri_nombre_y_apellido +
         "&reg_pri_lugar_nacimiento=" + reg_pri_lugar_nacimiento +
         "&reg_pri_fecha_nacimiento=" + reg_pri_fecha_nacimiento +
         "&reg_pri_nombre_padre=" + reg_pri_nombre_padre +
         "&reg_pri_nombre_madre=" + reg_pri_nombre_madre +
         "&reg_pri_nombre_padrino=" + reg_pri_nombre_padrino +
         "&reg_pri_nombre_madrina=" + reg_pri_nombre_madrina +
         "&reg_pri_libro=" + reg_pri_libro +
         "&reg_pri_folio=" + reg_pri_folio +
         "&reg_pri_numero_reg=" + reg_pri_numero_reg +
         "&reg_pri_ministro=" + reg_pri_ministro;


		let nombre = reg_pri_nombre_y_apellido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/regagregarprimera.php",
				data:cadena,
				success:function(r){
				   if(r==1){
					alertify.success("Listo!");
					$('#tabla_registro').load('tablas/tabla_registro.php');
				 	}else{
					alertify.error("Error!");
					$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
				   }
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function regagregarconfirma() {
id_rubro = 1;
id_tipo_ingreso = 10;
reg_con_parroquia = $('#reg_con_parroquia').val();
reg_con_nombre_y_apellido = $('#reg_con_nombre_y_apellido').val();
reg_con_lugar_bautizo = $('#reg_con_lugar_bautizo').val();
reg_con_fecha_bautismo = $('#reg_con_fecha_bautismo').val();
reg_con_informacion_bautizo = $('#reg_con_informacion_bautizo').val();
reg_con_fecha_confirmacion = $('#reg_con_fecha_confirmacion').val();
reg_con_nombre_padre = $('#reg_con_nombre_padre').val();
reg_con_nombre_madre = $('#reg_con_nombre_madre').val();
reg_con_nombre_padrino_madrina = $('#reg_con_nombre_padrino_madrina').val();
reg_con_ministro = $('#reg_con_ministro').val();
reg_con_libro = $('#reg_con_libro').val();
reg_con_folio = $('#reg_con_folio').val();
reg_con_numero_reg = $('#reg_con_numero_reg').val();

cadena = "id_rubro=" + id_rubro +
         "&id_tipo_ingreso=" + id_tipo_ingreso +
         "&reg_con_parroquia=" + reg_con_parroquia +
         "&reg_con_nombre_y_apellido=" + reg_con_nombre_y_apellido +
         "&reg_con_lugar_bautizo=" + reg_con_lugar_bautizo +
         "&reg_con_fecha_bautismo=" + reg_con_fecha_bautismo +
         "&reg_con_informacion_bautizo=" + reg_con_informacion_bautizo +
         "&reg_con_fecha_confirmacion=" + reg_con_fecha_confirmacion +
         "&reg_con_nombre_padre=" + reg_con_nombre_padre +
         "&reg_con_nombre_madre=" + reg_con_nombre_madre +
		 "&reg_con_nombre_padrino_madrina=" + reg_con_nombre_padrino_madrina +
         "&reg_con_ministro=" + reg_con_ministro +
         "&reg_con_libro=" + reg_con_libro +
         "&reg_con_folio=" + reg_con_folio +
         "&reg_con_numero_reg=" + reg_con_numero_reg;

		let nombre = reg_con_nombre_y_apellido.length;
		if(nombre > 1)
		{			
			$.ajax({
				type:"POST",
				url:"php/regagregarconfirma.php",
				data:cadena,
				success:function(r){
					if(r==1){
						alertify.success("Listo!");
						$('#tabla_registro').load('tablas/tabla_registro.php');
						 }else{
						alertify.error("Error!");
						$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
					}
				}
				
			}
		   );
		}else{
		alert('Faltan datos importantes');
		}	
			
}
function formaregistro(datos){

	d=datos.split('||');
	window.idregistro = d[0];       
    $('#mod_libro').val(d[1]);
	$('#mod_folio').val(d[2]);
	$('#mod_num_reg').val(d[3]);

}
function subirregistro(){
	id_registro = window.idregistro;

	mod_libro = $('#mod_libro').val();
	mod_folio = $('#mod_folio').val();
	mod_num_reg = $('#mod_num_reg').val();
	
	cadena = "id_registro=" + id_registro +
			 "&mod_libro=" + mod_libro +
			 "&mod_folio=" + mod_folio +
			 "&mod_num_reg=" + mod_num_reg;

	    	let libro = mod_libro.length;
			let folio = mod_folio.length;
			let registro = mod_num_reg.length;
			if(libro >= 1 && folio >= 1 && registro >= 1)
			{			
				$.ajax({
					type:"POST",
					url:"php/subirregistro.php",
					data:cadena,
					success:function(r){
						if(r==1){
							alert('listo');
							$('#tabla_registro').load('tablas/tabla_registro.php');
							location.reload();
							loc
							 }else{
							alertify.error("Error!");
							$('#tabla_facturas').load('tablas/tabla_facturas.php'); 
						}
					}
					
				}
			   );
			}else{
			alert('Faltan datos importantes');
			}	
				
	}
function agregarfechas(usuario) {
		let fecha_inical = $('#fecha_inical').val();
		let fecha_final = $('#fecha_final').val();
		
		
		if (fecha_inical.length >= 1 && fecha_final.length >= 1) {
			let cadena = "usuario=" + usuario +
						 "&fecha_inical=" + encodeURIComponent(fecha_inical) +
						 "&fecha_final=" + encodeURIComponent(fecha_final);

						
			$.ajax({
				type: "POST",
				url: "php/agregarfechas.php",
				data: cadena,
				success: function(r) {
					if (r == 1) {
						alert('Listo');
						$('#tabla_reportediario').load('tablas/tabla_reportediario.php'); 
						location.reload();
					} else {
						alertify.error("Error!");
						$('#tabla_reportediario').load('tablas/tabla_reportediario.php'); 
					}
				},
				error: function(xhr, status, error) {
					console.error("Error en AJAX:", error);
					alertify.error("Fallo en la solicitud.");
				}
			});
		} else {
			alert('Faltan datos importantes');
		}
}
function agregaform(numero, saldo){
	window.idefactura = numero;
	window.saldo = saldo;

}
function agregarabono(usuario) {
		let abono = $('#valor_abono').val();
		let abono_observacion = $('#abono_observacion').val();

		
	if(abono > window.saldo){
		alert('No es posible hacer un abono superior al valor de saldo');
	}else
	{
		if (abono.length >= 1 ) {
			let cadena = "usuario=" + usuario +
             "&id_factura=" + window.idefactura +
			 "&abono_observacion=" + abono_observacion +
             "&valor_abono=" + abono;
	
			$.ajax({
				type: "POST",
				url: "php/agregarabono.php",
				data: cadena,
				success: function(r) {
					if (r == 1) {
						alert('Listo');
						$('#tabla_abonos').load('tablas/tabla_abonos.php'); 
						location.reload();
					} else {
						alertify.error("Error!");
						$('#tabla_abonos').load('tablas/tabla_abonos.php'); 
					}
				},
				error: function(xhr, status, error) {
					console.error("Error en AJAX:", error);
					alertify.error("Fallo en la solicitud.");
				}
			});
		} else {
			alert('Faltan datos importantes');
		}
	}
}
function agregarfechasmisa(usuario) {
		
		let fecha_inical = $('#fecha_buscar_misa').val();
		let fecha_final = $('#fecha_buscar_misa').val();
		
		
		if (fecha_inical.length >= 1 && fecha_final.length >= 1) {
			let cadena = "usuario=" + usuario +
						 "&fecha_inical=" + encodeURIComponent(fecha_inical) +
						 "&fecha_final=" + encodeURIComponent(fecha_final);

						
			$.ajax({
				type: "POST",
				url: "php/agregarfechas.php",
				data: cadena,
				success: function(r) {
					if (r == 1) {
						alert('Listo');
						$('#tabla_reportediario').load('tablas/tabla_reportediario.php'); 
						location.reload();
					} else {
						alertify.error("Error!");
						$('#tabla_reportediario').load('tablas/tabla_reportediario.php'); 
					}
				},
				error: function(xhr, status, error) {
					console.error("Error en AJAX:", error);
					alertify.error("Fallo en la solicitud.");
				}
			});
		} else {
			alert('Faltan datos importantes');
		}
}
function agregarColaborador(){

	nombre=$('#nombreColaborador').val();
	apellido=$('#apellidoColaborador').val();		
	lugartrabajo=$('#lugartrabajo').val();
	documento=$('#documentoColaborador').val();
	contacto=$('#contacto').val();	
	nombreUsuario=$('#nombreUsuario').val();
	psw=$('#psw').val();


	let nombreclienteAux = nombre.length;
	let apellidoclienteAux = apellido.length;
	let lugartrabajoAux = lugartrabajo.length;
	let nombreUsuarioAux = nombreUsuario.length;
	let pswAux = psw.length;
	

	if(lugartrabajoAux > 1 && nombreUsuarioAux > 1 && pswAux > 1 && apellidoclienteAux > 1 && nombreclienteAux > 1)
	{
	
	cadena= "nombre=" + nombre +
	"&apellido=" + apellido +
	"&lugartrabajo=" + lugartrabajo +
	"&documento=" + documento +
	"&contacto=" + contacto +
	"&nombreUsuario=" + nombreUsuario +
	"&psw=" + psw;
		  
			 $.ajax({
			 type:"POST",
			 url:"php/agregarempleado.php",
			 data:cadena,
			 success:function(r){
				if(r==1){					
					location.reload();
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
function preguntarSiNosuspenderUsuario(id){
	alertify.confirm('Suspender Usuario', '¿Esta seguro de suspender a esta usuario?', 
					function(){ suspenderUsuario(id); }
                , function(){ alertify.error('Se cancelo')});


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

async function imprimirFila3(boton) {
    const { jsPDF } = window.jspdf;

    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');
    const valores = Array.from(celdas).slice(1).map(td => td.innerText);

    // Contenido que se va a renderizar
    const labels = ["Factura", "Nombre","ID", "Telefono", "Tipo", "Emitido", "Ofrenda", "Fecha"];

    const lineHeight = 15;
    const contentHeight = labels.length * lineHeight + 100; // 100 extra por encabezado/pie

    const margenSuperior = 40;
    const margenInferior = 40;

    const totalHeight = contentHeight + margenSuperior + margenInferior;

    const doc = new jsPDF({
        unit: 'pt',
        format: [220, totalHeight], // 58 mm x alto dinámico
    });

    const now = new Date();
    const fecha = now.toLocaleDateString();
    const hora = now.toLocaleTimeString();

    let y = margenSuperior;
	//doc.text("-------------------------------", 10, y);
    doc.setFontSize(10);
	y += 20;
    doc.text("** FACTURA DE SERVICIO **", 110, y, { align: "center" });

    y += 20;
    doc.text(`Fecha: ${fecha}`, 10, y);
    y += 15;
    doc.text(`Hora: ${hora}`, 10, y);
    y += 15;
    doc.text("-------------------------------", 10, y);

    y += 15;
    for (let i = 0; i < labels.length; i++) {
        doc.text(`${labels[i]}: ${valores[i]}`, 10, y);
        y += lineHeight;
    }

    y += 10;
    doc.text("-------------------------------", 10, y);
    y += 20;
    doc.text("¡ Gracias por su visita !", 110, y, { align: "center" });
	y += 10;
    doc.text("--------------------------------", 10, y);
   
    

    doc.save('factura.pdf');
}
async function imprimirFila(boton) {
    const { jsPDF } = window.jspdf;

    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');
    const valores = Array.from(celdas).slice(1).map(td => td.innerText);

    const labels = ["Factura", "Nombre", "ID", "Telefono", "Tipo", "Emitido", "Ofrenda", "Fecha"];
    const lineHeight = 15;
    const contentHeight = labels.length * lineHeight + 140; // Más espacio por encabezado
    const margenSuperior = 40;
    const margenInferior = 40;
    const totalHeight = contentHeight + margenSuperior + margenInferior;

    const doc = new jsPDF({
        unit: 'pt',
        format: [220, totalHeight], // 58 mm de ancho
    });

    const now = new Date();
    const fecha = now.toLocaleDateString();
    const hora = now.toLocaleTimeString();

    let y = margenSuperior;

    // Encabezado institucional
    doc.setFontSize(9);
    doc.text("Parroquia Nuestra Senora del Carmen", 110, y, { align: "center" });
    y += 12;
    doc.text("La Cruz - Narino", 110, y, { align: "center" });
    y += 12;
    doc.text("NIT: 8140038201", 110, y, { align: "center" });

    y += 20;
    doc.setFontSize(10);
    doc.text("** FACTURA DE SERVICIO **", 110, y, { align: "center" });

    y += 20;
    doc.text(`Fecha: ${fecha}`, 10, y);
    y += 15;
    doc.text(`Hora: ${hora}`, 10, y);
    y += 15;
    doc.text("-------------------------------", 10, y);

    y += 15;
    for (let i = 0; i < labels.length; i++) {
        doc.text(`${labels[i]}: ${valores[i]}`, 10, y);
        y += lineHeight;
    }

    y += 10;
    doc.text("-------------------------------", 10, y);
    y += 20;
    doc.text("¡ Gracias por su visita !", 110, y, { align: "center" });
    y += 10;
    doc.text("--------------------------------", 10, y);

    doc.save('factura.pdf');
}

async function imprimirBoleta4(boton) {
    const { jsPDF } = window.jspdf;

    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');

	const response = await fetch('/churchprogram/admin/js/escudo.txt');
    const escudoBase64 = await response.text();

    const datos = Array.from(celdas).slice(2).map(td => ({
        clave: td.dataset.label,
        valor: td.innerText.trim()
    })).filter(d => d.valor !== '');
	const titulo = datos[0]?.valor || ""; 
	

    const doc = new jsPDF();

    // 🔰 Insertar escudo (base64 o URL convertida)
	
    doc.addImage(escudoBase64.trim(), 'PNG', 90, 10, 30, 30); // centrado arriba
    // Título debajo del escudo
	
    doc.setFontSize(16);
    doc.text(titulo, 105, 50, { align: "center" });

    // Tabla de datos
    const headers = [["Campo", "Valor"]];
    const body = datos.map(d => [d.clave, d.valor]);

    doc.autoTable({
        startY: 60,
        head: headers,
        body: body,
        theme: 'grid',
        headStyles: { fillColor: [26, 188, 156] }
    });

    let finalY = doc.lastAutoTable.finalY;

    // Firma
    doc.setFontSize(12);
    doc.text("Firma y Sello:", 20, finalY + 30);
    doc.line(20, finalY + 35, 100, finalY + 35);

    // Pie de página
    doc.setFontSize(10);
    doc.setTextColor(150);
    doc.text("Parroquia Nuestra Señora del Carmen", 105, 285, { align: "center" });

    doc.save('registro.pdf');
}
async function imprimirMisa(boton) {
	const { jsPDF } = window.jspdf;
    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');

    const evento = celdas[1].innerText.trim();
    const nombreContacto = celdas[2].innerText.trim();
    const identificacion = celdas[3].innerText.trim();
    const celular = celdas[4].innerText.trim();
    const fechaEvento = celdas[5].innerText.trim();
    const horaEvento = celdas[6].innerText.trim();
    const lugar = celdas[7].innerText.trim();
    const ministro = celdas[8].innerText.trim();
    const intencion = celdas[9].innerText.trim();

    const labelFactura = document.querySelector('label');
    const numeroFactura = labelFactura.innerText.match(/\d+/)[0];

    const campoBaseAltura = 5;
    const margenSuperior = 18;
    const margenInferior = 10;
    const anchoTexto = 54;

    const tempDoc = new jsPDF({
      orientation: 'portrait',
      unit: 'mm',
      format: [58, 200]
    });

    const textoIntencion = tempDoc.splitTextToSize(`Intención: ${intencion}`, anchoTexto);
    const numLineasIntencion = textoIntencion.length;
    const totalLineas = 10 + numLineasIntencion; // líneas fijas + intencion
    const altoTotal = margenSuperior + totalLineas * campoBaseAltura + margenInferior;

    const doc = new jsPDF({
      orientation: 'portrait',
      unit: 'mm',
      format: [58, altoTotal]
    });

    doc.setFontSize(10);

    // Encabezado decorativo
    doc.text("**************************", 2, 8);
    doc.text("Datos de Misa", 2, 12);
    doc.text(`Factura No: ${numeroFactura}`, 2, 16);
    doc.text("**************************", 2, 20);

    let y = 26;

    const datos = [
      ["Evento", evento],
      ["Nombre Contacto", nombreContacto],
      ["Identificación", identificacion],
      ["Celular", celular],
      ["Fecha Evento", fechaEvento],
      ["Hora Evento", horaEvento],
      ["Lugar", lugar],
      ["Ministro", ministro]
    ];

    datos.forEach(([campo, valor]) => {
      doc.text(`${campo}: ${valor}`, 2, y);
      y += campoBaseAltura;
    });

    doc.text(textoIntencion, 2, y);
    y += numLineasIntencion * campoBaseAltura;

    // Línea final
    doc.text("**************************", 2, y + 2);

    doc.save(`misa_factura_${numeroFactura}.pdf`);
}

async function imprimirMisa2(boton) {
    const { jsPDF } = window.jspdf;

    // Obtener la fila desde el botón presionado
    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');

    // Obtener número de factura desde el label
    const facturaText = document.getElementById('facturaLabel').innerText;

    // Etiquetas esperadas
    const labels = [
        "Evento", "Nombre", "Identificacion", "Celular",
        "Fecha del Evento", "Hora del Evento", "Lugar", 
        "Ministro", "Intencion", "Ofrenda"
    ];

    // Obtener los valores de las celdas (omitir la primera celda con el botón)
    const valores = Array.from(celdas).slice(1).map(td => td.innerText);

    const lineHeight = 15;
    const margenSuperior = 40;
    const margenInferior = 40;
    let estimatedHeight = labels.length * lineHeight + margenSuperior + margenInferior + 140;

    const doc = new jsPDF({
        unit: 'pt',
        format: [220, estimatedHeight], // 58mm x alto dinámico
    });

    const now = new Date();
    const fecha = now.toLocaleDateString();
    const hora = now.toLocaleTimeString();

    let y = margenSuperior;

    // Encabezado de la parroquia
    doc.setFontSize(9);
    doc.text("Parroquia Nuestra Senora del Carmen", 110, y, { align: "center" });
    y += 12;
    doc.text("La Cruz - Narino", 110, y, { align: "center" });
    y += 12;
    doc.text("NIT: 8140038201", 110, y, { align: "center" });

    y += 20;
    doc.setFontSize(10);
    doc.text("** REGISTRO DE MISA **", 110, y, { align: "center" });

    y += 20;
    doc.text(facturaText, 10, y); // Número de factura
    y += 15;
    doc.text(`Fecha: ${fecha}`, 10, y);
    y += 15;
    doc.text(`Hora: ${hora}`, 10, y);

    y += 15;
    doc.text("-------------------------------", 10, y);

    y += 15;

    // Contenido principal: etiquetas + valores
    for (let i = 0; i < labels.length; i++) {
        let texto = `${labels[i]}: ${valores[i]}`;

        // Dividir texto largo (por ejemplo, Intención)
        let lineas = doc.splitTextToSize(texto, 200); // Ancho máximo de línea: 200pt
        doc.text(lineas, 10, y);
        y += lineas.length * lineHeight;
    }

    y += 10;
    doc.text("-------------------------------", 10, y);
    y += 20;
    doc.text("¡ Que Dios lo bendiga !", 110, y, { align: "center" });
    y += 10;
    doc.text("--------------------------------", 10, y);

    doc.save('misa.pdf');
}
async function generarPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'pt', 'a4');
    const pageWidth = doc.internal.pageSize.getWidth();
    const pageHeight = doc.internal.pageSize.getHeight();
    const margin = 40;
    let y = margin;

    // Estilo de fuente general
    doc.setFont('helvetica');
    doc.setFontSize(10);
    doc.setFont(undefined, 'normal');

    // ✅ Encabezado principal
    doc.setFontSize(14);
    doc.setFont(undefined, 'bold');
    doc.text('PARROQUIA NUESTRA SEÑORA DEL CARMEN', pageWidth / 2, y, { align: 'center' });
	y += 15;	
    doc.text('INFORME ECONÓMICO PARROQUIAL', pageWidth / 2, y, { align: 'center' });

    y += 25;
    doc.setFontSize(10);
    doc.setFont(undefined, 'normal');
    doc.text(`Presentado por: ${usuario}`, margin, y);
    y += 15;
    doc.text(`Dia: ${fechaInicio}`, margin, y);
    y += 25;

    const secciones = [
        { id: 'tabla_despacho', titulo: 'Descripción despacho parroquial' },
        { id: 'tabla_localesparroquiales', titulo: 'Locales Parroquiales' },
        { id: 'tabla_otrosingresosdis', titulo: 'Otros Ingresos discriminado' },
        { id: 'tabla_egresosreporte', titulo: 'Egresos' },
        { id: 'tabla_reportetotal', titulo: 'Reportes Finales' }
    ];

    for (const seccion of secciones) {
        const element = document.getElementById(seccion.id);
        if (!element) continue;

        // Título de sección
        doc.setFontSize(11);
        doc.setFont(undefined);
		doc.setTextColor(0, 102, 102);
        doc.text(seccion.titulo, margin, y);
        y += 15;

        // Captura con alta resolución
        const canvas = await html2canvas(element, {
            scale: 2,
            useCORS: true
        });

        const imgData = canvas.toDataURL('image/png');
        const imgWidth = pageWidth - margin * 2;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;

        // Salto de página si no cabe
        if (y + imgHeight > pageHeight - margin) {
            doc.addPage();
            y = margin;
        }

        doc.addImage(imgData, 'PNG', margin, y, imgWidth, imgHeight);
        y += imgHeight + 20;
    }

    doc.save('reporte_parroquial.pdf');
}
async function generarPDFReporte() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'pt', 'a4');
    const pageWidth = doc.internal.pageSize.getWidth();
    const pageHeight = doc.internal.pageSize.getHeight();
    const margin = 40;
    let y = margin;

    // Estilo de fuente general
    doc.setFont('helvetica');
    doc.setFontSize(10);
    doc.setFont(undefined, 'normal');

    // ✅ Encabezado principal
    doc.setFontSize(14);
    doc.setFont(undefined, 'bold');
    doc.text('PARROQUIA NUESTRA SEÑORA DEL CARMEN', pageWidth / 2, y, { align: 'center' });
	y += 15;	
    doc.text('INFORME ECONÓMICO PARROQUIAL', pageWidth / 2, y, { align: 'center' });

    y += 25;
    doc.setFontSize(10);
    doc.setFont(undefined, 'normal');
    doc.text(`Presentado por: ${usuario}`, margin, y);
    y += 15;
    doc.text(`Rango de fechas: ${fechaInicio} al ${fechaFin}`, margin, y);
    y += 25;

    const secciones = [
        { id: 'tabla_localesparroquiales', titulo: 'Locales Parroquiales' },
        { id: 'tabla_reportediario', titulo: 'Reporte Diario' },
		{ id: 'tabla_despacho', titulo: 'Descripción despacho parroquial' },
        { id: 'tabla_otrosingresosdis', titulo: 'Otros Ingresos discriminado' },
		{ id: 'tabla_reportecem', titulo: 'Tabla Cementerio' },
        { id: 'tabla_egresosreporte', titulo: 'Egresos' },
        { id: 'tabla_reportetotal', titulo: 'Reportes Finales' }
    ];

    for (const seccion of secciones) {
        const element = document.getElementById(seccion.id);
        if (!element) continue;

        // Título de sección
        doc.setFontSize(11);
        doc.setFont(undefined);
		doc.setTextColor(0, 102, 102);
        doc.text(seccion.titulo, margin, y);
        y += 15;

        // Captura con alta resolución
        const canvas = await html2canvas(element, {
            scale: 2,
            useCORS: true
        });

        const imgData = canvas.toDataURL('image/png');
        const imgWidth = pageWidth - margin * 2;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;

        // Salto de página si no cabe
        if (y + imgHeight > pageHeight - margin) {
            doc.addPage();
            y = margin;
        }

        doc.addImage(imgData, 'PNG', margin, y, imgWidth, imgHeight);
        y += imgHeight + 20;
    }

    doc.save('reporte_parroquial.pdf');
}
async function generarWordReporte() {
    const { Document, Packer, Paragraph, TextRun, HeadingLevel } = window.docx;

    const doc = new Document({
        sections: [{
            children: [
                new Paragraph({
                    text: "PARROQUIA NUESTRA SEÑORA DEL CARMEN",
                    heading: HeadingLevel.HEADING_1,
                    alignment: "center",
                }),
                new Paragraph({
                    text: "INFORME ECONÓMICO PARROQUIAL",
                    heading: HeadingLevel.HEADING_2,
                    alignment: "center",
                    spacing: { after: 200 }
                }),
                new Paragraph({
                    children: [new TextRun(`Presentado por: ${usuario}`)],
                    spacing: { after: 100 }
                }),
                new Paragraph({
                    children: [new TextRun(`Rango de fechas: ${fechaInicio} al ${fechaFin}`)],
                    spacing: { after: 200 }
                })
            ]
        }]
    });

    const secciones = [
        { id: 'tabla_localesparroquiales', titulo: 'Locales Parroquiales' },
        { id: 'tabla_reportediario', titulo: 'Reporte Diario' },
        { id: 'tabla_despacho', titulo: 'Descripción despacho parroquial' },
        { id: 'tabla_otrosingresosdis', titulo: 'Otros Ingresos discriminado' },
        { id: 'tabla_egresosreporte', titulo: 'Egresos' },
        { id: 'tabla_reportetotal', titulo: 'Reportes Finales' }
    ];

    for (const seccion of secciones) {
        const element = document.getElementById(seccion.id);
        if (!element) continue;

        // Capturar imagen de la tabla (igual que con html2canvas)
        const canvas = await html2canvas(element, { scale: 2, useCORS: true });
        const dataUrl = canvas.toDataURL('image/png');

        // Convertir la imagen a formato base64 sin encabezado
        const base64 = dataUrl.replace(/^data:image\/png;base64,/, "");

        doc.addSection({
            children: [
                new Paragraph({
                    text: seccion.titulo,
                    heading: HeadingLevel.HEADING_3,
                    spacing: { after: 100 }
                }),
                new Paragraph({
                    children: [
                        new window.docx.ImageRun({
                            data: Uint8Array.from(atob(base64), c => c.charCodeAt(0)),
                            transformation: {
                                width: 500,
                                height: (canvas.height * 500) / canvas.width
                            }
                        })
                    ],
                    spacing: { after: 300 }
                })
            ]
        });
    }

    const blob = await Packer.toBlob(doc);
    saveAs(blob, "reporte_parroquial.docx");
}













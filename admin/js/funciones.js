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
	res_lugar=$('#res_fecha').val();
	res_hora=$('#res_hora').val();
	res_intencion=$('#res_intencion').val();
	res_nombre_contacto=$('#res_nombre_contacto').val();
	res_celular_contacto=$('#res_celular_contacto').val();
	

	cadena= "id_tipo_ingreso=" + id_tipo_ingreso +
			"&id_rubro=" + id_rubro +
	        "&res_nombre_ofrece=" + res_nombre_ofrece +
			"&res_lugar=" + res_lugar +
			"&res_fecha=" + res_fecha +
			"&res_hora=" + res_hora +
			"&res_intencion=" + res_intencion +
			"&res_nombre_contacto=" + res_nombre_contacto +
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
			"&bol_ba_nombre_padrino=" + bol_pri_nombre_padrino +
			"&bol_ba_nombre_madrina=" + bol_pri_nombre_madrina +
			"&bol_ba_abuelos_paternos=" + bol_pri_ministro + 
			"&bol_ba_abuelos_maternos=" + bol_pri_recibido + 
			"&bol_ba_ministro_bautizo=" + bol_pri_identificacion + 
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
		case "Bobedas":
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

	cadena= "id_rubro=" + id_rubro +
			"&id_tipo_ingreso=" + id_tipo_ingreso +
	        "&cem_recibido=" + cem_recibido +
			"&cem_cedula=" + cem_cedula +
			"&cem_observacion=" + cem_observacion +
			"&cem_celular=" + cem_celular +
			"&cem_ciudad=" + cem_ciudad;
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

async function imprimirFila(boton) {
    const [{ jsPDF }] = await Promise.all([
        window.jspdf ? Promise.resolve(window.jspdf) : import("https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js")
    ]);

    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');
    const valores = Array.from(celdas).slice(1).map(td => td.innerText); // omitir la celda del botón

    const columnas = ["No. Factura", "Nombre", "Telefono", "Tipo", "Rubro", "Ofrenda", "Fecha"];

    const doc = new jsPDF();
    doc.autoTable({
        head: [columnas],
        body: [valores]
    });
    doc.save('fila.pdf');
}
async function imprimirFila2(boton) {
    const { jsPDF } = window.jspdf;

    const fila = boton.closest('tr');
    const celdas = fila.querySelectorAll('td');
    const valores = Array.from(celdas).slice(1).map(td => td.innerText);

    // Ancho 58mm = ~220 puntos (1mm ≈ 2.83pt)
    const doc = new jsPDF({
        unit: 'pt',
        format: [220, 500], // ancho 58mm, alto ajustable
    });

    const now = new Date();
    const fecha = now.toLocaleDateString();
    const hora = now.toLocaleTimeString();

    doc.setFontSize(10);
	doc.text("-------------------------------", 10, 70);
	doc.text("-------------------------------", 10, 70);
    doc.text("** FACTURA DE SERVICIO **", 110, 20, { align: "center" });
    doc.text(`Fecha: ${fecha}`, 10, 40);
    doc.text(`Hora: ${hora}`, 10, 55);
    doc.text("-------------------------------", 10, 70);

    const labels = ["Factura", "Nombre", "Teléfono", "Tipo", "Rubro", "Ofrenda", "Fecha"];
    let y = 85;
    for (let i = 0; i < labels.length; i++) {
        doc.text(`${labels[i]}: ${valores[i]}`, 10, y);
        y += 15;
    }

    doc.text("-------------------------------", 10, y + 10);
    doc.text("¡Gracias por su visita!", 110, y + 30, { align: "center" });
	doc.text("-------------------------------", 10, 70);
	doc.text("¡Gracias por su visita!", 110, y + 30, { align: "center" });

    doc.save('factura.pdf');
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




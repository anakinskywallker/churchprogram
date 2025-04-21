function creartramite() {
      
	tipomisa=$('#tipomisa').val();

	switch (tipoMisa) {
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

	cadena= "id_tipo_ingreso=" + id_tipo_ingreso +
			"&misa_nombreofrece=" + misa_nombreofrece +
			"&misa_lugar=" + misa_lugar + 
			"&misa_fecha=" + misa_fecha +
			"&misa_hora=" + misa_hora +
			"&misa_intencion=" + misa_intencion;
	aler(cadena);			
					
		/*
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
			*/
				
}
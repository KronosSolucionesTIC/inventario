<script type="text/javascript">
	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaEquipos').DataTable(
        	{
                "pagingType": "full_numbers",
                "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "Todos"]],
                "language": {
                    "lengthMenu":     "Mostrando _MENU_ registros",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "search":         "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "zeroRecords": "No hay registros que coincidan.",
                    "infoEmpty": "No se encuentran registros.",
                    "infoFiltered":   "(Filtrando _MAX_ registros en total)",
                    "paginate": {
                        "first":      "<--",
                        "last":       "-->",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                },
                "order": []
            }
        );
    });

    //Funcion boton crear equipo
	$("#btn_crear_equipo").click(function(){
		$("#modalEquipoLabel").text("Crear equipo");
		$("#btn_guardar_equipo").attr("data-accion","crear");
		$("#form_equipo")[0].reset();
	});

	//Funcion guardar equipo
	$("#btn_guardar_equipo").click(function(){
		resultado = campos_incompletos();
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_equipo();
			}
			if(accion == 'editar'){
				edita_equipo();
			}
		}
	});

	//Funcion guardar tipo de equipo
	$("#btn_guardar_tipo_equipo").click(function(){
		validar_tipo_equipo();
		return false;
	});

	//Funcion para guardar el tipo de equipo
	function crea_tipo_equipo(){
		var cadena = "";
	 	nombre_tipo_equipo = $("#nombre_tipo_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_tipo_equipo='+nombre_tipo_equipo+'&tipo=inserta_tipo_equipo'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalTipoEquipo").removeClass("show");
	      $("#modalTipoEquipo").removeClass("modal-backdrop");
	      carga_tipo_equipo();
	      $("#nombre_tipo_equipo").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para cargar tipo de equipo
	function carga_tipo_equipo(){

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "id_equipo="+id_equipo+"&tipo=ultimo_tipo_equipo",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_tipo_equipo"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_tipo_equipo")
            		optionText = value;
	        });
	        $('#fkID_tipo_equipo').append(new Option(optionText, optionValue));
	        $('#fkID_tipo_equipo').val(optionValue);
	        alert('Guardado el tipo de equipo');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para validar tipo de equipo
	function validar_tipo_equipo(){
	 	nombre_tipo_equipo = $("#nombre_tipo_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_tipo_equipo='+nombre_tipo_equipo+'&tipo=valida_tipo_equipo',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('El tipo de equipo ya esta registrado');
	      	$("#nombre_tipo_equipo").val("");
	      	$("#nombre_tipo_equipo").focus();
	      } else {
	      	crea_tipo_equipo();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Campos incompletos
	function campos_incompletos(){
		var bandera = true;
		if($("#serial_equipo").val().length == 0){
			bandera = false;
		}
		if($('#fkID_tipo_equipo').val().trim() == 0){
			bandera = false;
		}
		if($('#fkID_modelo').val().trim() == 0){
			bandera = false;
		}
		if($('#fkID_marca').val().trim() == 0){
			bandera = false;
		}
		if($('#fkID_procesador').val().trim() == 0){
			bandera = false;
		}
		if(bandera == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Cambia el ID de procesador
	$("#fkID_tipo_equipo").change(function(){
		id = $(this).val();
		console.log(id);
		if(id == 2 || id == 5 || id == 6 || id == 7){
			$("#fkID_procesador").val("7");
			$('#fkID_procesador').attr('disabled',true);
		} else {
			$("#fkID_procesador").val("");
			$('#fkID_procesador').removeAttr('disabled',false);
		}
	});

	//Evento cuando pierde el foco
	$("#serial_equipo").blur(function(){
		validar_serial();
	});

	//Funcion para validar que no se repite el serial
	function validar_serial(){
		var cadena = "";
	 	serial_equipo = $("#serial_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'serial_equipo='+serial_equipo+'&tipo=valida_serial',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('El serial ya esta registrado');
	      	$("#serial_equipo").val("");
	      	$("#serial_equipo").focus();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el equipo
	function crea_equipo(){
		var cadena = "";
	 	serial = $("#serial_equipo").val();
	 	fkID_tipo_equipo = $("#fkID_tipo_equipo").val();
	 	fkID_modelo = $("#fkID_modelo").val();
	 	fkID_marca = $("#fkID_marca").val();
	 	fkID_procesador = $("#fkID_procesador").val();
	 	observaciones_equipo = $("#observaciones_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'serial_equipo='+serial+'&fkID_tipo_equipo='+fkID_tipo_equipo+'&fkID_modelo='+fkID_modelo+'&fkID_marca='+fkID_marca+'&fkID_procesador='+fkID_procesador+'&observaciones_equipo='+observaciones_equipo+'&tipo=inserta'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      alert('Guardado correctamente');
	      location.reload();

	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion guardar equipo
	$("[name*='btn_editar']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		console.log('Entro a editar equipo');
		$("#modalEquipoLabel").text("Editar equipo");
		carga_equipo(id_equipo);
		$("#btn_guardar_equipo").attr("data-accion","editar");
	});

	//Carga el equipo por el ID
	function carga_equipo(id_equipo){

	    console.log("Carga el equipo "+ id_equipo);

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "id_equipo="+id_equipo+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	        id_equipo = data.id_equipo;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el equipo
	function edita_equipo(){
		id_equipo = $("#id_equipo").val();
	 	serial = $("#serial_equipo").val();
	 	fkID_tipo_equipo = $("#fkID_tipo_equipo").val();
	 	fkID_modelo = $("#fkID_modelo").val();
	 	fkID_marca = $("#fkID_marca").val();
	 	fkID_procesador = $("#fkID_procesador").val();
	 	observaciones_equipo = $("#observaciones_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_equipo='+id_equipo+'&serial_equipo='+serial+'&fkID_tipo_equipo='+fkID_tipo_equipo+'&fkID_modelo='+fkID_modelo+'&fkID_marca='+fkID_marca+'&fkID_procesador='+fkID_procesador+'&observaciones_equipo='+observaciones_equipo+'&tipo=edita'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      alert('Actualizado correctamente');
	      location.reload();

	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion eliminar equipo
	$("[name*='btn_eliminar']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		$("#btn_eliminar_equipo").attr("data-id-equipo",id_equipo);
	});

	//Funcion eliminar equipo
	$("[name*='btn_eliminar_equipo']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		elimina_equipo(id_equipo);
	});

	//Funcion para eliminar el equipo
	function elimina_equipo(id_equipo){
	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_equipo='+id_equipo+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      alert('Eliminado correctamente');
	      location.reload();

	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion guardar modelo
	$("#btn_guardar_modelo").click(function(){
		validar_modelo();
		return false;
	});

	//Funcion para validar modelo
	function validar_modelo(){
	 	nombre_modelo = $("#nombre_modelo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_modelo='+nombre_modelo+'&tipo=valida_modelo',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('El modelo ya esta registrado');
	      	$("#nombre_modelo").val("");
	      	$("#nombre_modelo").focus();
	      } else {
	      	crea_modelo();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el modelo
	function crea_modelo(){
	 	nombre_modelo = $("#nombre_modelo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_modelo='+nombre_modelo+'&tipo=inserta_modelo'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalModelo").removeClass("show");
	      $("#modalModelo").removeClass("modal-backdrop");
	      carga_modelo();
	      $("#nombre_modelo").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para cargar el registro guardado
	function carga_modelo(){

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "tipo=ultimo_modelo",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_modelo"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_modelo")
            		optionText = value;
	        });
	        $('#fkID_modelo').append(new Option(optionText, optionValue));
	        $('#fkID_modelo').val(optionValue);
	        alert('Guardado el modelo');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion guardar marca
	$("#btn_guardar_marca").click(function(){
		validar_marca();
		return false;
	});

	//Funcion para validar modelo
	function validar_marca(){
	 	nombre_marca = $("#nombre_marca").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_marca='+nombre_marca+'&tipo=valida_marca',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('La marca ya esta registrada');
	      	$("#nombre_marca").val("");
	      	$("#nombre_marca").focus();
	      } else {
	      	crea_marca();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el marca
	function crea_marca(){
	 	nombre_marca = $("#nombre_marca").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_marca='+nombre_marca+'&tipo=inserta_marca'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalMarca").removeClass("show");
	      $("#modalMarca").removeClass("modal-backdrop");
	      carga_marca();
	      $("#nombre_marca").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para cargar el registro guardado
	function carga_marca(){

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "tipo=ultima_marca",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_marca"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_marca")
            		optionText = value;
	        });
	        $('#fkID_marca').append(new Option(optionText, optionValue));
	        $('#fkID_marca').val(optionValue);
	        alert('Guardada la marca');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion guardar procesador
	$("#btn_guardar_procesador").click(function(){
		validar_procesador();
		return false;
	});

	//Funcion para validar procesador
	function validar_procesador(){
	 	nombre_procesador = $("#nombre_procesador").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_procesador='+nombre_procesador+'&tipo=valida_procesador',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('La procesador ya esta registrado');
	      	$("#nombre_procesador").val("");
	      	$("#nombre_procesador").focus();
	      } else {
	      	crea_procesador();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el procesador
	function crea_procesador(){
	 	nombre_procesador = $("#nombre_procesador").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_procesador='+nombre_procesador+'&tipo=inserta_procesador'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalProcesador").removeClass("show");
	      $("#modalProcesador").removeClass("modal-backdrop");
	      carga_procesador();
	      $("#nombre_procesador").val("");
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para cargar el registro guardado
	function carga_procesador(){

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "tipo=ultimo_procesador",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_procesador"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_procesador")
            		optionText = value;
	        });
	        $('#fkID_procesador').append(new Option(optionText, optionValue));
	        $('#fkID_procesador').val(optionValue);
	        alert('Guardado el procesador');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para el detalle de equipo
	$("[name*='btn_detalle']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		console.log(id_equipo);
        $('#tabla').load('equipos/detalle_equipo.php?id_equipo='+id_equipo);
    });


	//Funcion para imprimir
	$("#btn_imprimir").click(function(){
		printDiv('tablaHistorico');
    	return false;
    });

	//Funcion para imprimir
	function printDiv(nombreDiv) {
     	var contenido= document.getElementById(nombreDiv).innerHTML;
     	var contenidoOriginal= document.body.innerHTML;

     	document.body.innerHTML = contenido;
     	window.location="../vista/index.php";
     	window.print();
	}
</script>

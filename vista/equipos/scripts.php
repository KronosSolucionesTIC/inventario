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
		$("#btn_guardando").hide();
		limpiar_campos();
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
			marcar_campos("#serial_equipo", 'incorrecto');
		} else {
			marcar_campos("#serial_equipo", 'correcto');
		}
		if($('#fkID_tipo_equipo').val().trim() == 0){
			bandera = false;
			marcar_campos("#fkID_tipo_equipo", 'incorrecto');
		}  else {
			marcar_campos("#fkID_tipo_equipo", 'correcto');
		}
		if($('#fkID_modelo').val().trim() == 0){
			bandera = false;
			marcar_campos("#fkID_modelo", 'incorrecto');
		} else {
			marcar_campos("#fkID_modelo", 'correcto');
		}
		if($('#fkID_marca').val().trim() == 0){
			bandera = false;
			marcar_campos("#fkID_marca", 'incorrecto');
		} else {
			marcar_campos("#fkID_marca", 'correcto');
		}
		if($('#fkID_procesador').val().trim() == 0){
			bandera = false;
			marcar_campos("#fkID_procesador", 'incorrecto');
		} else {
			marcar_campos("#fkID_procesador", 'correcto');
		}
		if($('#fkID_ram').val().trim() == 0){
			bandera = false;
			marcar_campos("#fkID_ram", 'incorrecto');
		} else {
			marcar_campos("#fkID_ram", 'correcto');
		}
		if(bandera == false){
			alertify.alert(
				'Campos incompletos',
				'Los campos con * son obligatorios',
				function(){
					alertify.error('Campos vacios');
			});
			return false;
		} else {
			return true;
		}
	}

	function marcar_campos(campo, tipo){
		if(tipo == 'correcto'){
			$(campo).removeClass('is-invalid');
			$(campo).addClass('is-valid');
		}
		if(tipo == 'incorrecto'){
			$(campo).removeClass('is-valid');
			$(campo).addClass('is-invalid');
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
	 	accion = $("#btn_guardar_equipo").attr('data-accion');
	 	if(accion=='editar'){
			id_equipo = $("#id_equipo").val();
	 	}
	 	if(accion=='crear'){
	 		id_equipo = '0';
	 	}
	 	console.log(id_equipo);

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'serial_equipo='+serial_equipo+'&id_equipo='+id_equipo+'&tipo=valida_serial',
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
	 	fkID_ram = $("#fkID_ram").val();
	 	fkID_sistema_operativo = $("#fkID_sistema_operativo").val();
	 	observaciones_equipo = $("#observaciones_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'serial_equipo='+serial+'&fkID_tipo_equipo='+fkID_tipo_equipo+'&fkID_modelo='+fkID_modelo+'&fkID_marca='+fkID_marca+'&fkID_procesador='+fkID_procesador+'&fkID_ram='+fkID_ram+'&fkID_sistema_operativo='+fkID_sistema_operativo+'&observaciones_equipo='+observaciones_equipo+'&tipo=inserta'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_guardar_equipo").hide();
	      $("#btn_guardando").show();
	      alertify.success('Creado correctamente');
		  setTimeout('cargar_sitio()',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Carga eventos
	carga_eventos();

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
	          if(key == 'fkID_marca'){
	          	marca = value;
	          }
	          if(key == 'fkID_modelo'){
	          	modelo = value;
	          }
	          if(key == 'fkID_procesador' && value == 7){
	          	$('#fkID_procesador').attr('disabled',true);
	          }
	        });
	        cargar_select_modelo(marca, modelo);

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
	 	fkID_ram = $("#fkID_ram").val();
	 	fkID_sistema_operativo = $("#fkID_sistema_operativo").val();
	 	observaciones_equipo = $("#observaciones_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_equipo='+id_equipo+'&serial_equipo='+serial+'&fkID_tipo_equipo='+fkID_tipo_equipo+'&fkID_modelo='+fkID_modelo+'&fkID_marca='+fkID_marca+'&fkID_procesador='+fkID_procesador+'&fkID_ram='+fkID_ram+'&fkID_sistema_operativo='+fkID_sistema_operativo+'&observaciones_equipo='+observaciones_equipo+'&tipo=edita'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_guardar_equipo").hide();
	      $("#btn_guardando").show();
	      alertify.success('Editado correctamente');
		  setTimeout('cargar_sitio()',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para eliminar el equipo
	function elimina_equipo(id_equipo){
	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_equipo='+id_equipo+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_equipo").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio()',1000);
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
		resultado = campos_modelo();
		if(resultado == true){
			validar_modelo();
		}
		return false;
	});

	//Funcion para validar campos marca
	function campos_modelo(){
		bandera = true;
		if($("#id_marca").val().length == 0){
			bandera = false;
			marcar_campos("#id_marca", 'incorrecto');
		} else {
			marcar_campos("#id_marca", 'correcto');
		}
		if($("#nombre_modelo").val() == ""){
			bandera = false;
			marcar_campos("#nombre_modelo", 'incorrecto');
		} else {
			marcar_campos("#nombre_modelo", 'correcto');
		}

		if(bandera == false){
			alertify.alert(
				'Campos incompletos',
				'Los campos con * son obligatorios',
				function(){
					alertify.error('Campos vacios');
			});
			return false;
		} else {
			return true;
		}
	}

	//Funcion para validar modelo
	function validar_modelo(){
		id_marca = $("#id_marca").val();
	 	nombre_modelo = $("#nombre_modelo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_modelo='+nombre_modelo+'&fkID_marca='+id_marca+'&tipo=valida_modelo',
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
		id_marca = $("#id_marca").val();
	 	nombre_modelo = $("#nombre_modelo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_modelo='+nombre_modelo+'&fkID_marca='+id_marca+'&tipo=inserta_modelo'
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

	//Funcion para exportar a excel
	$("#btn_excel").click(function(){
		var contenido= document.getElementById('tablaHistorico').innerHTML;
		window.location = "../vista/equipos/excel_equipo.php?tabla="+contenido;
    	return false;
    });

	//Funcion para exportar a PDF
	$("#btn_pdf").click(function(){
		var contenido= document.getElementById('tablaHistorico').innerHTML;
		window.location = "../vista/equipos/pdf_equipo.php?tabla="+contenido;
    	return false;
    });

	//Funcion para retroceder Miga de pan
    $("#miga_equipo").click(function(){
        $('#tabla').load('equipos/index.php');
    });

    //Funcion para cargar sitio
    function cargar_sitio(){
  		$("#modalEquipo").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('equipos/index.php');
    }

	//Funcion para pasar eventos
    $(".paginate_button").click(function(){
        carga_eventos();
    });

	//Funcion para pasar eventos
    $("[type*='search']").keypress(function(){
        carga_eventos();
    });

	//Funcion editar
	function evento_editar(){
		$("[name*='btn_editar']").click(function(){
			id_equipo = $(this).attr('data-id-equipo');
			console.log('Entro a editar equipo');
			$("#modalEquipoLabel").text("Editar equipo");
			carga_equipo(id_equipo);
			$("#btn_guardar_equipo").attr("data-accion","editar");
			$("#btn_guardando").hide();
			limpiar_campos();
		});
	}

	//Funcion eliminar
	function evento_eliminar(){
		//Funcion eliminar equipo
		$("[name*='btn_eliminar']").click(function(){
			$("#btn_eliminando").hide();
			id_equipo = $(this).attr('data-id-equipo');
			$("#btn_eliminar_equipo").attr("data-id-equipo",id_equipo);
		});

		//Funcion eliminar equipo
		$("[name*='btn_eliminar_equipo']").click(function(){
			id_equipo = $(this).attr('data-id-equipo');
			elimina_equipo(id_equipo);
		});
	}

	//Funcion para pasar eventos
	function carga_eventos(){
		evento_editar();
		evento_eliminar();
	}

	//Funcion para limpiar campos
	function limpiar_campos(){
		$("input").removeClass('is-invalid');
		$("input").removeClass('is-valid');
		$("select").removeClass('is-invalid');
		$("select").removeClass('is-valid');
	}

	//Llena el select de modelo
	$("#fkID_marca").change(function(){
		id_marca = $(this).val();
		cargar_select_modelo(id_marca,0);
	});

	//Cargar select modelo
	function cargar_select_modelo(id_marca,modelo){
	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_marca='+id_marca+'&tipo=consulta_modelo',
	      dataType : 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      if(data.length >0){

		  	for (var i = 0; i < data.length; i++) {
	      		$('#fkID_modelo').append(new Option(data[i]["nombre_modelo"], data[i]["id_modelo"]));
	      		if(modelo != 0){
	      			$('#fkID_modelo').val(modelo);
	      		} else {
	      			console.log('El modelo es 0');
	      		}
	      	}
	      }

	   	})
	    .fail(function(data) {
	    	vaciar_modelo();
	    	alertify.alert(
				'No existen registros',
				'Verifique la marca o cree un nuevo modelo',
				function(){
					alertify.error('No existen modelos con la marca seleccionada');
			});
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Vacia el select modelo
	function vaciar_modelo(){
		$('#fkID_modelo')[0].options.length = 0;
		$('#fkID_modelo').append(new Option('Seleccione...', 0));
	}

	//Funcion guardar ram
	$("#btn_guardar_ram").click(function(){
		validar_ram();
		return false;
	});

	//Funcion para validar modelo
	function validar_ram(){
	 	nombre_ram = $("#nombre_ram").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_ram='+nombre_ram+'&tipo=valida_ram',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('La ram ya esta registrada');
	      	$("#nombre_ram").val("");
	      	$("#nombre_ram").focus();
	      } else {
	      	crea_ram();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el ram
	function crea_ram(){
	 	nombre_ram = $("#nombre_ram").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_ram='+nombre_ram+'&tipo=inserta_ram'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalRam").removeClass("show");
	      $("#modalRam").removeClass("modal-backdrop");
	      carga_ram();
	      $("#nombre_ram").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para cargar el registro guardado
	function carga_ram(){

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "tipo=ultima_ram",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_ram"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_ram")
            		optionText = value;
	        });
	        $('#fkID_ram').append(new Option(optionText, optionValue));
	        $('#fkID_ram').val(optionValue);
	        alert('Guardada la ram');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion guardar sistema_operativo
	$("#btn_guardar_sistema_operativo").click(function(){
		validar_sistema_operativo();
		return false;
	});

	//Funcion para validar sistema operativo
	function validar_sistema_operativo(){
	 	nombre_sistema_operativo = $("#nombre_sistema_operativo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_sistema_operativo='+nombre_sistema_operativo+'&tipo=valida_sistema_operativo',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('El sistema operativo ya esta registrado');
	      	$("#nombre_sistema_operativo").val("");
	      	$("#nombre_sistema_operativo").focus();
	      } else {
	      	crea_sistema_operativo();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el sistema_operativo
	function crea_sistema_operativo(){
	 	nombre_sistema_operativo = $("#nombre_sistema_operativo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'nombre_sistema_operativo='+nombre_sistema_operativo+'&tipo=inserta_sistema_operativo'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalSistemaOperativo").removeClass("show");
	      $("#modalSistemaOperativo").removeClass("modal-backdrop");
	      carga_sistema_operativo();
	      $("#nombre_sistema_operativo").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para cargar el registro guardado
	function carga_sistema_operativo(){

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "tipo=ultima_sistema_operativo",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_sistema_operativo"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_sistema_operativo")
            		optionText = value;
	        });
	        $('#fkID_sistema_operativo').append(new Option(optionText, optionValue));
	        $('#fkID_sistema_operativo').val(optionValue);
	        alert('Guardada la sistema_operativo');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>

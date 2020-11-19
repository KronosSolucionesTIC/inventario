<script type="text/javascript">
	//Funcion para el detalle del proyecto
	$("[name*='btn_detalle']").click(function(){
		id_proyecto = $(this).attr('data-id-proyecto');
		console.log(id_equipo);
        $('#tabla').load('proyectos/detalle_proyecto.php?id_proyecto='+id_proyecto);
    });
	var pass_antiguo;

var agregarte = [];
var cargarterri = [];
//agregarte.push(['Study',2]);
var len = agregarte.length;
//console.log(agregarte[5][1]); // 9
console.log(len)

	//Funcion abrir formulario de empleado
	$("#btnadicionproyecto").click(function(){
		$("#form_Proyecto")[0].reset();
		$("#territorial_agregada").empty();
        $("#fkID_proyecto").prop('disabled', true);
	});

	//Funcion guardar empleado
	$("#btn_guardar_Proyecto").click(function(){
		respuesta = validar_campos_proyecto();
		if (respuesta) {
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_proyecto();
			}
			if(accion == 'editar'){
				console.log("editamos")
				 edita_Proyecto();
			}
		}
	});

	//Funcion para agregar territoriales a div
	$("#btn_agregar_Territorial").click(function(){
		respuesta=validar_campos_territorial();
		if (respuesta) {
			direccion = $("#direccion_territorial").val();
	 		fkID_territorial = $("#fkID_territorial2").val();
	 		nombre_territorial = $('select[name="fkID_territorial2"] option:selected').text();
	 		console.log(direccion+" "+fkID_territorial+" "+nombre_territorial);
	 		agregar_campo(direccion,fkID_territorial,nombre_territorial)
		} 
	});

	function agregar_campo(direccion,id,nombre) {
		camponombre = '<div class="form-group row" id="territorial'+id+'">'+
			'<div class="col-sm-10" >'+
              '<label class="form-control " type="text" id="territorial' + id + '"  name="territorial' + id + '">'+nombre.toUpperCase()+'     '+direccion.toUpperCase()+'</label>'+
              '</div>'+ 
              '<div class="col-sm-2 text-center">'+
              '<button data-id-territorial="'+id+'" type="button" class="btn btn-danger"'+
               'id="btn_eliminar_Territorial'+id+'">X</button>'+
            '</div></div>';
		$("#territorial_agregada").append(camponombre);
		$("#direccion_territorial").val('');
	 	$("#fkID_territorial2").val('');
	 	$("#direccion_territorial").removeClass('is-invalid');
      	$("#direccion_territorial").removeClass('is-valid');
      	$("#fkID_territorial2").removeClass('is-invalid');
      	$("#fkID_territorial2").removeClass('is-valid');
      	console.log("si")
      	//Funcion eliminar territorial seleccionada
	$("#btn_eliminar_Territorial"+id).click(function(){ 
		console.log("chavo")
		id_territorial = $(this).attr('data-id-territorial');
		campo = "territorial"+id_territorial
		$("#"+campo).remove();
		var len = agregarte.length;
			for (var i = 0; i < len; i++) {
		    if (agregarte[i][0]==id) { 
		    agregarte.splice(i,1);
		    }
		}
	});
	//crea el arrays de la territorial para agregar
	agregarte.push([id,direccion]);
	}

	//Funcion guardar Usuario
	$("[name*='btn_editar']").click(function(){
		id_Proyecto = $(this).attr('data-id-proyecto');
		console.log('Entro a editar Proyecto');
		$("#modalProyectoLabel").text("Editar Proyecto");
		carga_Proyecto(id_Proyecto);
		$("#btn_guardar_Proyecto").attr("data-accion","editar");
		$("#btn_guardando").hide();
	})

	//Funcion para guardar 
	function edita_Proyecto(){
		console.log("edita vegeta")
		id_proyecto = $("#id_proyecto").val();
		nombre_Proyecto = $("#nombre_proyecto").val();
	    $.ajax({ 
	      url: "../controlador/ajaxProyecto.php",
	      data: 'id_proyecto='+id_proyecto+'&nombre_proyecto='+  nombre_Proyecto +'&tipo=edita',
	      dataType: 'json',
	     success:function(data){
	     	console.log("vegeta")
	      console.log(data[0]["id"]);
	      proyecto = $("#id_proyecto").val();
	      console.log(proyecto)
	      edita_territoriales(proyecto);
	      //$("#modalProyecto").removeClass("show");
	      //$("#modalProyecto").removeClass("modal-backdrop");
	      //alertify.success('Actualizado correctamente');
		  //setTimeout('cargar_sitio()',1000);

		}
	})
	}

	//Funcion para crear proyecto
	function crea_proyecto(){
	 	nombre_Proyecto = $("#nombre_proyecto").val();
	    $.ajax({
	      url: "../controlador/ajaxProyecto.php", 
	      data: 'nombre_proyecto='+nombre_Proyecto+'&tipo=inserta_proyecto',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      console.log("vegeta")
	      console.log(data[0]["id"]);
	      fkID_proyecto = data[0]["id"];
	      agrega_territoriales(data[0]["id"]);
	      console.log(data[0]["id"])
	      $("#modalProyecto").removeClass("show");
	      $("#modalProyecto").removeClass("modal-backdrop");
	      alertify.success('Creado correctamente');
		  setTimeout('cargar_sitio()',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log("OK");
	    });
	}

	//Funcion para agrgar territoriales proyecto
	function agrega_territoriales(fkID_proyecto){
		console.log("chaviito")
	 	var len = agregarte.length;
			for (var i = 0; i < len; i++) {
		    console.log(agregarte[i][0]);
		    console.log(agregarte[i][1]);
		    console.log(fkID_proyecto);
			insertar_territoriales(fkID_proyecto,agregarte[i][0],agregarte[i][1]);
	    }
	}

	//Funcion para agrgar territoriales proyecto editado
	function edita_territoriales(fkID_proyecto){
		console.log("chaviito")
	 	var len = agregarte.length;
	 	var ten = cargarterri.length;
			for (var i = 0; i < len; i++) {
				for (var j = 0; j < ten; j++) {
					if (agregarte[i][0]==cargarterri[j][0]) {
						cont=1;
						if (agregarte[i][1]!=cargarterri[j][1]) {
							actualizar_territoriales(fkID_proyecto,agregarte[i][0],agregarte[i][1])
						}
					} 
				}
				if (cont!=1) {
					insertar_territoriales(fkID_proyecto,agregarte[i][0],agregarte[i][1]);	
				}
			cont=0;
	    }
	}

	//Funcion para agrgar territoriales proyecto
	function insertar_territoriales(fkID_proyecto,id_territorial,direccion){
		console.log("proyecto "+fkID_proyecto+" territorial "+id_territorial+ " direccion "+direccion)
		console.log(fkID_proyecto);
		console.log(id_territorial);
		console.log(direccion);
	    $.ajax({
	      url: "../controlador/ajaxProyecto.php", 
	      data: 'fkID_territorial='+id_territorial+'&direccion_territorial='+direccion+'&fkID_proyecto='+fkID_proyecto+'&tipo=agregar_territorial',
	      success:function(r){
			console.log(r);
		}
	    })
	}

	//Funcion para editar territoriales que ya fueron asignadas al proyecto
	function actualizar_territoriales(fkID_proyecto,id_territorial,direccion){
		console.log(fkID_proyecto)
	    $.ajax({
	      url: "../controlador/ajaxProyecto.php", 
	      data: 'fkID_territorial='+id_territorial+'&direccion_territorial='+direccion+'&fkID_proyecto='+fkID_proyecto+'&tipo=agregar_territorial',
	      success:function(r){
			console.log("OK");
		}
	    })
	}

	//Carga datos del proyecto
	function carga_Proyecto(id_proyecto){
	    $.ajax({
	        url: "../controlador/ajaxProyecto.php",
	        data: 'id_proyecto='+id_proyecto+'&tipo=consultaproyecto',
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log("popeye")
	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value); 
	          $("#"+key).val(value);
	        });
	        cargar_territoriales_proyecto(id_proyecto);
	    })
	    .fail(function(data) {
	    	console.log("pailas")
	        //console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	//Carga datos del proyecto
	function cargar_territoriales_proyecto(id_proyecto){
		console.log(id_proyecto)
	    $.ajax({
	        url: "../controlador/ajaxProyecto.php",
	        data: "id_proyecto="+id_proyecto+"&tipo=consultadatosterritoriales",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	var len = data.length;
			for (var i = 0; i < len; i++) {
	        $.each(data[i], function( key, value ) {
	          console.log(key+"--"+value);
	          if (key=="id_territorial_proyecto") {id = value};
	          if (key=="fkID_territorial") {id_territorial = value};
	          if (key=="nombre_territorial") {nombre = value};
	          if (key=="direccion_territorial") {direccion = value};
	          if (key=="fkID_proyecto") {id_proyecto = value};
	        });
	        editar_territorial(id,id_territorial,nombre,direccion,id_proyecto)
	        }
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	function editar_territorial(id,id_territorial,nombre,direccion,id_proyecto) {
		camponombre = '<div class="form-group row" id="territorial'+id_territorial+'">'+
			'<div class="col-sm-10" >'+
              '<label class="form-control " type="text" id="territorial' + id_territorial + '"  name="territorial' + id_territorial + '">'+nombre+'     '+direccion+'</label>'+
              '</div>'+
              '<div class="col-sm-2 text-center">'+
              '<button data-id-territorial="'+id_territorial+'" data-id-proyecto="'+id_proyecto+'" type="button" class="btn btn-danger"'+
               'id="btn_eliminar_Territorial'+id_territorial+'">X</button>'+
            '</div></div>';
		$("#territorial_agregada").append(camponombre);
		$("#direccion_territorial").val('');
	 	$("#fkID_territorial2").val('');
	 	$("#fkID_proyecto").val(id_proyecto);
	 	$("#direccion_territorial").removeClass('is-invalid');
      	$("#direccion_territorial").removeClass('is-valid');
      	$("#fkID_territorial2").removeClass('is-invalid');
      	$("#fkID_territorial2").removeClass('is-valid');
      	console.log("si")
      	//Funcion eliminar territorial seleccionada
	$("#btn_eliminar_Territorial"+id_territorial).click(function(){ 
		console.log("chavo")
		id_territorial = $(this).attr('data-id-territorial');
		campo = "territorial"+id_territorial
		respues = confirmar_territorial(id,id_territorial,nombre,direccion,id_proyecto)
		console.log("mi respuesta es"+respues)
		if (respues == 1) {
		$("#"+campo).remove();
		var len = agregarte.length;
			for (var i = 0; i < len; i++) {
		    if (agregarte[i][0]==id_territorial) { 
		    agregarte.splice(i,1);
		    }
			}
		var ten = cargarterri.length;
			for (var i = 0; i < ten; i++) {
		    if (cargarterri[i][0]==id_territorial) { 
		    cargarterri.splice(i,1);
		    }
			}
		}
	});
	agregarte.push([id_territorial,direccion]);
	cargarterri.push([id_territorial,direccion]);
	}

	function confirmar_territorial(id) {
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar el registro?',
				function(){ elimina_territorial(id); mensaje = 1 },
                function(){ alertify.error('Se cancelo'); mensaje = 0});
		return mensaje;
	}

	//Funcion para eliminar la territorial
	function elimina_territorial(id){
	    $.ajax({
	      url: "../controlador/ajaxProyecto.php",
	      data: 'id_territorial_proyecto='+id+ '&tipo=elimina_territorial',
	    success:function(r){
			if (r==1) {
				//$("#modalProyecto").removeClass("show");
			    //$("#modalProyecto").removeClass("modal-backdrop");
			    alertify.success('Eliminado correctamente');
				//setTimeout('cargar_sitio()',1000);
			} else{  
				alertify.error("fallo el servidor");
			}
		}
	})
	}

	//Funcion eliminar Usuario
	$("[name*='btn_eliminar']").click(function(){
		id_proyecto = $(this).attr('data-id-proyecto');
		confirmar(id_proyecto);
	});

	function confirmar(id) {
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar el registro?',
				function(){ elimina_proyecto(id) },
                function(){ alertify.error('Se cancelo')});
	}

	//Funcion para eliminar el Usuario
	function elimina_proyecto(id_proyecto){
	    $.ajax({
	      url: "../controlador/ajaxProyecto.php",
	      data: 'id_proyecto='+id_proyecto+ '&tipo=elimina_logico',
	    success:function(r){
			if (r==1) {
				alertify.error("fallo el servidor");
			} else{  
				$('#tabla').load('proyectos/Vproyecto.php')
				alertify.success("Eliminado con exito");
			}
		}
	})
	}

	//validar el select de proyecto
	$("#fkID_proyecto").change(function(){
            fkID_proyecto = $("#fkID_proyecto").val();
            if (fkID_cargo < 1) {
            	console.log("hola")
            	$("#fkID_territorial").attr('disabled', 'disabled');
            } else {
            	console.log("no hola")
            	$("#fkID_territorial").prop('disabled', false);
            	cargar_territorial(fkID_proyecto);
            }
   
        });

	//Campos incompletos de usuario
	function validar_campos(){
		var bandera = true;
      if($("#nombre_cargo").val() == 0){
        bandera = false;
        marcar_campos("#nombre_cargo", 'incorrecto');
      } else {
        marcar_campos("#nombre_cargo", 'correcto');
      }
      if($("#fkID_persona").val() == 0){
        bandera = false;
        marcar_campos("#fkID_persona", 'incorrecto');
      } else {
        marcar_campos("#fkID_persona", 'correcto');
      }
      if($("#nombre_usuario").val() == 0){
        bandera = false;
        marcar_campos("#nombre_usuario", 'incorrecto');
      } else {
        marcar_campos("#nombre_usuario", 'correcto');
      }
      if($("#pass_usuario").val() == 0){
        bandera = false;
        marcar_campos("#pass_usuario", 'incorrecto');
      } else {
        marcar_campos("#pass_usuario", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Campos incompletos de usuario
	function validar_campos_territorial(){
		var bandera = true;
      if($("#direccion_territorial").val() == 0){
        bandera = false;
        marcar_campos("#direccion_territorial", 'incorrecto');
      } else {
        marcar_campos("#direccion_territorial", 'correcto');
      }
      if($("#fkID_territorial2").val() == 0){
        bandera = false;
        marcar_campos("#fkID_territorial2", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial2", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Campos incompletos de proyecto
	function validar_campos_proyecto(){
		var bandera = true;
      if($("#nombre_Proyecto").val() == 0){
        bandera = false;
        marcar_campos("#nombre_Proyecto", 'incorrecto');
      } else {
        marcar_campos("#nombre_Proyecto", 'correcto');
      }
      if($("#territorial_agregada").html()==""){
        bandera = false;
        marcar_campos("#fkID_territorial2", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial2", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario ó agregue una territorial');
			return false;
		} else {
			return true;
		}
	}

	//Campos incompletos de empleado
	function validar_campos_empleado(){
		var bandera = true;
      if($("#nombre_empleado").val().length == 0){
        bandera = false;
        marcar_campos("#nombre_empleado", 'incorrecto');
      } else {
        marcar_campos("#nombre_empleado", 'correcto');
      }
      if($("#fkID_cargo").val() == 0){
        bandera = false;
        marcar_campos("#fkID_cargo", 'incorrecto');
      } else {
        marcar_campos("#fkID_cargo", 'correcto');
      }
      if($("#apellido_empleado").val().length == 0){
        bandera = false;
        marcar_campos("#apellido_empleado", 'incorrecto');
      } else {
        marcar_campos("#apellido_empleado", 'correcto');
      }
      if($("#cedula_empleado").val().length == 0){
        bandera = false;
        marcar_campos("#cedula_empleado", 'incorrecto');
      } else {
        marcar_campos("#cedula_empleado", 'correcto');
      }
      if($("#email_empleado").val().length == 0){
        bandera = false;
        marcar_campos("#email_empleado", 'incorrecto');
      } else {
        marcar_campos("#email_empleado", 'correcto');
      }
      if($("#fkID_proyecto").val() == 0){
        bandera = false;
        marcar_campos("#fkID_proyecto", 'incorrecto');
      } else {
        marcar_campos("#fkID_proyecto", 'correcto');
      }
      if($("#fkID_territorial").val() == 0){
        bandera = false;
        marcar_campos("#fkID_territorial", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Funcion para marcar los campos
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



	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaProyecto').DataTable(
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

    //Funcion para cargar sitio
    function cargar_sitio(){
  		$("#modalEquipo").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('proyectos/Vproyecto.php');
    }

    function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	    	alert("Error: La dirección de correo " + email + " es incorrecta.");
	    	$("#email").val("");
	    }else{
	    	return true;
	    }	    
	}

	//validar el select de personas
	$("#fkID_territorial2").change(function(){
		   fkID_territorial = $("#fkID_territorial2").val();
		   var len = agregarte.length;
			for (var i = 0; i < len; i++) {
				if (agregarte[i][0]==fkID_territorial) {
					alert("La territorial ya esta asignada");
					$("#fkID_territorial2").val(0);
				}
	    }
    });



    //Funcion para retroceder Miga de pan
    $("#miga_proyecto").click(function(){
        $('#tabla').load('proyectos/Vproyecto.php');
    });



</script>
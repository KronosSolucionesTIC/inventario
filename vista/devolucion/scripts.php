<script type="text/javascript">
    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaDevolucion').DataTable(
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

    //Carga los eventos
    carga_eventos();

    //Funcion boton crear devolucion
    $("#btn_crear_devolucion").click(function(){
        $("#modalDevolucionProyectoLabel").text("Crear devolución");
        $("#btn_guardar_devolucion_proyecto").attr("data-accion","crear");
        $("#form_devolucion_proyecto")[0].reset();
        $("#btn_guardando").hide();
        limpiar_campos();
    });

    //Funcion para limpiar campos
    function limpiar_campos(){
        $("input").removeClass('is-invalid');
        $("input").removeClass('is-valid');
        $("select").removeClass('is-invalid');
        $("select").removeClass('is-valid');
    }

    //Lista los equipos de cada proyecto
    $("#fkID_proyecto").change(function(){
        fkID_proyecto = $(this).val();
        $.ajax({
            url: "../controlador/ajaxDevolucion.php",
            data: "fkID_proyecto="+fkID_proyecto+"&tipo=lista_equipos",
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data) {
            if(data.length >0){
                borra_items();
                for (var i = 0; i < data.length; i++) {
                    var htmlTags = '<tr>';
                    htmlTags += '<td><input type="checkbox" /></td>';
                    htmlTags += '<td>'+ data[i]["nombre_tipo_equipo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["serial_equipo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["devuelve"] + '</td>';
                    htmlTags += '</tr>';
                    $('#tablaDevolucionProyectos tbody').append(htmlTags);
                }
            }
        })
        .fail(function(data) {
            borra_items();
            alertify.alert(
                'No existen equipos',
                'El proyecto seleccionado no tiene equipos asignados',
                function(){
                    alertify.error('Verifique el proyecto');
            });
        })
        .always(function(data) {
            console.log(data);
        });
    });

    //Borra la tabla
    function borra_items(tabla){
        $('#'+tabla+' td').remove();
    }

    //Funcion guardar devolucion
    $("#btn_guardar_devolucion").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
            accion = $(this).attr('data-accion');
            if(accion == 'crear'){
                crea_devolucion();
            }
            if(accion == 'editar'){
                edita_devolucion();
            }
        }
    });

    //Campos incompletos
    function campos_incompletos(){
        var bandera = true;
        if($("#fkID_proyecto_funcionario").val().trim() == 0){
            bandera = false;
            marcar_campos("#fkID_proyecto_funcionario", 'incorrecto');
        } else {
            marcar_campos("#fkID_proyecto_funcionario", 'correcto');
        }
        if($('#fkID_territorial_funcionario').val().trim() == 0){
            bandera = false;
            marcar_campos("#fkID_territorial_funcionario", 'incorrecto');
        }  else {
            marcar_campos("#fkID_territorial_funcionario", 'correcto');
        }
        if($('#fkID_persona_funcionario').val().trim() == 0){
            bandera = false;
            marcar_campos("#fkID_persona_funcionario", 'incorrecto');
        } else {
            marcar_campos("#fkID_persona_funcionario", 'correcto');
        }
        //Valida si esta seleccionado o no
        var arrayEquipos = new Array();
        $('.check:checked').each(
            function() {
                 arrayEquipos.push($(this).val());
            }
        );
        if(arrayEquipos.length == 0){
            $(".form-check-label").html('x');
            marcar_campos(".check", 'incorrecto');
            bandera = false;
        } else {
            $(".form-check-label").html();
            marcar_campos(".check:checked", 'correcto');
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
        return true;
    }

    //Funcion que muestra campos obligatorios
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

    //Funcion para cargar sitio
    function cargar_sitio(){
        $("#modalEquipo").removeClass("show");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $('#tabla').load('devolucion/index.php');
    }

    function crea_devolucion(){
        var parametros = new FormData($("#form_devolucion_proyecto")[0]);
        parametros.append("tipo", "inserta");
        parametros.append("observaciones",$("#observaciones").val());

        $.ajax({
          url: "../controlador/ajaxDevolucion.php",
          data: parametros,
          contentType: false,
          processData: false,
          type: 'POST'
        })
        .done(function(data) {
            console.log(data);
          //---------------------
          $("#btn_guardar_devolucion").hide();
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

    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaDevolucionFuncionario').DataTable(
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

    //Funcion boton crear devolucion
    $("#btn_crear_devolucion_funcionario").click(function(){
        $("#modalDevolucionFuncionarioLabel").text("Crear devolución");
        $("#btn_guardar_devolucion_funcionario").attr("data-accion","crear");
        $("#form_devolucion_funcionario")[0].reset();
        $("#btn_guardando_funcionario").hide();
        limpiar_campos_funcionario();
    });

    //Funcion para limpiar campos
    function limpiar_campos_funcionario(){
        $("input").removeClass('is-invalid');
        $("input").removeClass('is-valid');
        $("select").removeClass('is-invalid');
        $("select").removeClass('is-valid');
    }

    //Lista los equipos de cada proyecto
    $("#fkID_proyecto_funcionario").change(function(){
        fkID_proyecto = $(this).val();
        $.ajax({
            url: "../controlador/ajaxDevolucion.php",
            data: "fkID_proyecto="+fkID_proyecto+"&tipo=lista_territoriales",
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data) {
            if(data.length >0){
                limpia_select('fkID_territorial_funcionario');
                limpia_select('fkID_persona_funcionario');
                for (var i = 0; i < data.length; i++) {
                    $('#fkID_territorial_funcionario').append(new Option(data[i]["nombre_territorial"], data[i]["id_territorial"]));
                }
            }
        })
        .fail(function(data) {
            limpia_select('fkID_territorial_funcionario');
            limpia_select('fkID_persona_funcionario');
            alertify.alert(
                'No existen territoriales',
                'El proyecto seleccionado no tiene territoriales asignadas',
                function(){
                    alertify.error('Verifique el proyecto');
            });
        })
        .always(function(data) {
            console.log(data);
        });
    });

    //Funcion para limpiar select
    function limpia_select(select){
        $('#'+select).empty();
        $('#'+select).append(new Option('Seleccione...', '0'));
    }

    //Lista los funcionarios segun la territorial
    $("#fkID_territorial_funcionario").change(function(){
        fkID_territorial = $(this).val();
        $.ajax({
            url: "../controlador/ajaxDevolucion.php",
            data: "fkID_territorial="+fkID_territorial+"&tipo=lista_funcionarios",
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data) {
            if(data.length >0){
                limpia_select('fkID_persona_funcionario');
                for (var i = 0; i < data.length; i++) {
                    $('#fkID_persona_funcionario').append(new Option(data[i]["nombre_persona"], data[i]["id_persona"]));
                }
            }
        })
        .fail(function(data) {
            limpia_select('fkID_persona_funcionario');
            alertify.alert(
                'No existen funcionarios',
                'La territorial seleccionada no tiene funcionarios asignados',
                function(){
                    alertify.error('Verifique la territorial');
            });
        })
        .always(function(data) {
            console.log(data);
        });
    });

    //Lista los equipos segun el funcionario
    $("#fkID_persona_funcionario").change(function(){
        fkID_persona = $(this).val();
        $.ajax({
            url: "../controlador/ajaxDevolucion.php",
            data: "fkID_persona="+fkID_persona+"&tipo=lista_equipos_funcionario",
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data) {
            if(data.length >0){
                borra_items('divDevolucionFuncionario');
                for (var i = 0; i < data.length; i++) {
                    var htmlTags = '<tr>';
                    htmlTags += '<td>'+ data[i]["serial_equipo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["nombre_tipo_equipo"] + '</td>';
                    htmlTags += '<td><input type="checkbox" id="micheckbox" class="check form-check-input" value ="'+data[i]["id_equipo"]+'" /><label class="form-check-label" for="micheckbox"></label></td>';
                    htmlTags += '</tr>';
                    $('#divDevolucionFuncionario tbody').append(htmlTags);
                }
            }
        })
        .fail(function(data) {
            borra_items('divDevolucionFuncionario');
            alertify.alert(
                'No existen equipos',
                'El funcionario seleccionado no tiene equipos asignados',
                function(){
                    alertify.error('Verifique el funcionario');
            });
        })
        .always(function(data) {
            console.log(data);
        });
    });

    //Funcion guardar devolucion funcionario
    $("#btn_guardar_devolucion_funcionario").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
            accion = $(this).attr('data-accion');
            if(accion == 'crear'){
                crea_devolucion_funcionario();
            }
            if(accion == 'editar'){
                edita_devolucion_funcionario();
            }
        }
    });

    //Crea la devolucion del funcionario
    function crea_devolucion_funcionario(){
        var parametros = new FormData($("#form_devolucion_proyecto")[0]);
        parametros.append("tipo", "inserta_devolucion_funcionario");
        parametros.append("observaciones_funcionario",$("#observaciones_funcionario").val());
        parametros.append("fkID_persona_entrega",$("#fkID_persona_funcionario").val());
        parametros.append("fkID_persona_recibe",$("#usuario").val());
        parametros.append("fkID_proyecto",$("#fkID_proyecto_funcionario").val());
        //Proceso de array equipos
        var arrayEquipos = [];
        $('.check:checked').each(
            function() {
                 arrayEquipos.push($(this).val());
            }
        );

        parametros.append("arrayEquipos",JSON.stringify(arrayEquipos));

        $.ajax({
          url: "../controlador/ajaxDevolucion.php",
          data: parametros,
          contentType: false,
          processData: false,
          type: 'POST'
        })
        .done(function(data) {
            console.log(data);
          //---------------------
          $("#btn_guardar_devolucion_funcionario").hide();
          $("#btn_guardando_funcionario").show();
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

    //Funcion para pasar eventos
    $(".paginate_button").click(function(){
        carga_eventos();
    });

    //Funcion para pasar eventos
    $("[type*='search']").keypress(function(){
        carga_eventos();
    });

    //Funcion para pasar eventos
    function carga_eventos(){
        evento_editar();
    }

    //Funcion editar
    function evento_editar(){
        //Funcion para el acta de la devolucion
        $("[name*='btn_acta_funcionario']").click(function(){
            fkID_devolucion = $(this).attr('data-id-devolucion');
            console.log(fkID_devolucion);
        $.ajax({
            url: "../controlador/ajaxDevolucion.php",
            data: "fkID_devolucion="+fkID_devolucion+"&tipo=devolucion_funcionario",
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data) {
            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                $('#'+key).html(value);
                if(key == 'id_devolucion'){
                    var fkID_devolucion = value;
                }
            });
            //Lista de equipos
            detalleDevolucionFuncionario(fkID_devolucion);
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
        });
    }

    //Funcion detalle de devolucion funcionario
    function detalleDevolucionFuncionario(id_devolucion){
        $.ajax({
            url: "../controlador/ajaxDevolucion.php",
            data: "id_devolucion="+id_devolucion+"&tipo=detalle_devolucion_funcionario",
            dataType: 'json',
            type: 'POST'
        })
        .done(function(data) {
            console.log(data);
            if(data.length >0){
                borra_items('contenidoActaDevolucionFuncionario');
                for (var i = 0; i < data.length; i++) {
                    var htmlTags = '<tr>';
                    htmlTags += '<td>'+ data[i]["serial_equipo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["nombre_tipo_equipo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["nombre_modelo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["nombre_marca"] + '</td>';
                    htmlTags += '<td>'+ data[i]["nombre_sistema_operativo"] + '</td>';
                    htmlTags += '<td>'+ data[i]["nombre_ram"] + '</td>';
                    htmlTags += '</tr>';
                    $('#contenidoActaDevolucionFuncionario').append(htmlTags);
                }
            }
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }
</script>

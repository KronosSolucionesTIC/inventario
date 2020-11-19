<script type="text/javascript">
    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaFuncionarios').DataTable(
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

    //Funcion boton crear funcionario
    $("#btn_crear_funcionario").click(function(){
        $("#modalFuncionarioLabel").text("Crear funcionario");
        $("#btn_guardar_funcionario").attr("data-accion","crear");
        $("#form_funcionario")[0].reset();
        $("#btn_guardando").hide();
        limpiar_campos();
    });

    //Funcion guardar funcionario
    $("#btn_guardar_funcionario").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
            accion = $(this).attr('data-accion');
            if(accion == 'crear'){
                crea_funcionario();
            }
            if(accion == 'editar'){
                edita_funcionario();
            }
        }
    });

    //Campos incompletos
    function campos_incompletos(){
      var bandera = true;
      if($("#nombres_persona").val().length == 0){
        bandera = false;
        marcar_campos("#nombres_persona", 'incorrecto');
      } else {
        marcar_campos("#nombres_persona", 'correcto');
      }
      if($("#apellidos_persona").val().length == 0){
        bandera = false;
        marcar_campos("#apellidos_persona", 'incorrecto');
      } else {
        marcar_campos("#apellidos_persona", 'correcto');
      }
      if($("#documento_persona").val().length == 0){
        bandera = false;
        marcar_campos("#documento_persona", 'incorrecto');
      } else {
        marcar_campos("#documento_persona", 'correcto');
      }
      if($('#fkID_territorial').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_territorial", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial", 'correcto');
      }
      if($('#fkID_area').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_area", 'incorrecto');
      } else {
        marcar_campos("#fkID_area", 'correcto');
      }
      if($('#fkID_proyecto').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_proyecto", 'incorrecto');
      } else {
        marcar_campos("#fkID_proyecto", 'correcto');
      }
      if($('#fkID_tipo_persona').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_tipo_persona", 'incorrecto');
      } else {
        marcar_campos("#fkID_tipo_persona", 'correcto');
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

    //Funcion para guardar el funcionario
    function crea_funcionario(){
        nombres_persona = $("#nombres_persona").val();
        apellidos_persona = $("#apellidos_persona").val();
        documento_persona = $("#documento_persona").val();
        telefono_persona = $("#telefono_persona").val();
        celular_persona = $("#celular_persona").val();
        email_persona = $("#email_persona").val();
        fkID_territorial = $("#fkID_territorial").val();
        fkID_area = $("#fkID_area").val();
        fkID_tipo_persona = $("#fkID_tipo_persona").val();
        fkID_proyecto = $("#fkID_proyecto").val();
        fkID_cetap = $("#fkID_cetap").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombres_persona='+nombres_persona+'&apellidos_persona='+apellidos_persona+'&documento_persona='+documento_persona+'&telefono_persona='+telefono_persona+'&celular_persona='+celular_persona+'&email_persona='+email_persona+'&fkID_territorial='+fkID_territorial+'&fkID_area='+fkID_area+'&fkID_tipo_persona='+fkID_tipo_persona+'&fkID_proyecto='+fkID_proyecto+'&fkID_cetap='+fkID_cetap+'&tipo=inserta'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_funcionario").hide();
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

    //Funcion para cargar sitio
    function cargar_sitio(){
        $("#modalFuncionario").removeClass("show");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $('#tabla').load('funcionarios/index.php');
    }

    //Carga eventos
    carga_eventos();

    //Carga el funcionario por el ID
    function carga_funcionario(id_funcionario){

        console.log("Carga el funcionario "+ id_funcionario);

        $.ajax({
            url: "../controlador/ajaxFuncionario.php",
            data: "id_funcionario="+id_funcionario+"&tipo=consulta",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
              console.log(key+"--"+value);
              $("#"+key).val(value);
            });

            id_funcionario = data.id_funcionario;
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para guardar el funcionario
    function edita_funcionario(){
        id_persona = $("#id_persona").val();
        nombres_persona = $("#nombres_persona").val();
        apellidos_persona = $("#apellidos_persona").val();
        documento_persona = $("#documento_persona").val();
        telefono_persona = $("#telefono_persona").val();
        celular_persona = $("#celular_persona").val();
        email_persona = $("#email_persona").val();
        fkID_territorial = $("#fkID_territorial").val();
        fkID_area = $("#fkID_area").val();
        fkID_tipo_persona = $("#fkID_tipo_persona").val();
        fkID_proyecto = $("#fkID_proyecto").val();
        fkID_cetap = $("#fkID_cetap").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'id_persona='+id_persona+'&nombres_persona='+nombres_persona+'&apellidos_persona='+apellidos_persona+'&documento_persona='+documento_persona+'&telefono_persona='+telefono_persona+'&celular_persona='+celular_persona+'&email_persona='+email_persona+'&fkID_territorial='+fkID_territorial+'&fkID_area='+fkID_area+'&fkID_tipo_persona='+fkID_tipo_persona+'&fkID_proyecto='+fkID_proyecto+'&fkID_cetap='+fkID_cetap+'&tipo=edita'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_funcionario").hide();
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


    //Funcion para eliminar el funcionario
    function elimina_funcionario(id_persona){
        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'id_persona='+id_persona+'&tipo=elimina_logico'
        })
        .done(function(data) {
          //---------------------
          $("#btn_eliminar_funcionario").hide();
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

    //Funcion guardar territorial
    $("#btn_guardar_territorial").click(function(){
        validar_territorial();
        return false;
    });

    //Funcion para validar mterritorial
    function validar_territorial(){
        nombre_territorial = $("#nombre_territorial").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_territorial='+nombre_territorial+'&tipo=valida_territorial',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('La territorial ya esta registrada');
            $("#nombre_territorial").val("");
            $("#nombre_territorial").focus();
          } else {
            crea_territorial();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Funcion para guardar el marca
    function crea_territorial(){
        nombre_territorial = $("#nombre_territorial").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_territorial='+nombre_territorial+'&tipo=inserta_territorial'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalTerritorial").removeClass("show");
          $("#modalTerritorial").removeClass("modal-backdrop");
          carga_territorial();
          $("#nombre_territorial").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar el registro guardado
    function carga_territorial(){

        $.ajax({
            url: "../controlador/ajaxFuncionario.php",
            data: "tipo=ultima_territorial",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_territorial"){
                    optionValue = value;
                }
                if(key == "nombre_territorial")
                    optionText = value;
            });
            $('#fkID_territorial').append(new Option(optionText, optionValue));
            $('#fkID_territorial').val(optionValue);
            alert('Guardada la territorial');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion guardar area
    $("#btn_guardar_area").click(function(){
        validar_area();
        return false;
    });

    //Funcion para validar area
    function validar_area(){
        nombre_area = $("#nombre_area").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_area='+nombre_area+'&tipo=valida_area',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('El area ya esta registrada');
            $("#nombre_area").val("");
            $("#nombre_area").focus();
          } else {
            crea_area();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Funcion para guardar el area
    function crea_area(){
        nombre_area = $("#nombre_area").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_area='+nombre_area+'&tipo=inserta_area'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalArea").removeClass("show");
          $("#modalArea").removeClass("modal-backdrop");
          carga_area();
          $("#nombre_area").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar el registro guardado
    function carga_area(){

        $.ajax({
            url: "../controlador/ajaxFuncionario.php",
            data: "tipo=ultima_area",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_area"){
                    optionValue = value;
                }
                if(key == "nombre_area")
                    optionText = value;
            });
            $('#fkID_area').append(new Option(optionText, optionValue));
            $('#fkID_area').val(optionValue);
            alert('Guardada el area');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion guardar proyecto
    $("#btn_guardar_proyecto").click(function(){
        validar_proyecto();
        return false;
    });

    //Funcion para validar proyecto
    function validar_proyecto(){
        nombre_proyecto = $("#nombre_proyecto").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_proyecto='+nombre_proyecto+'&tipo=valida_proyecto',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('El proyecto ya esta registrado');
            $("#nombre_proyecto").val("");
            $("#nombre_proyecto").focus();
          } else {
            crea_proyecto();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Funcion para guardar el proyecto
    function crea_proyecto(){
        nombre_proyecto = $("#nombre_proyecto").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_proyecto='+nombre_proyecto+'&tipo=inserta_proyecto'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalProyecto").removeClass("show");
          $("#modalProyecto").removeClass("modal-backdrop");
          carga_proyecto();
          $("#nombre_proyecto").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar el registro guardado
    function carga_proyecto(){

        $.ajax({
            url: "../controlador/ajaxFuncionario.php",
            data: "tipo=ultimo_proyecto",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_proyecto"){
                    optionValue = value;
                }
                if(key == "nombre_proyecto")
                    optionText = value;
            });
            $('#fkID_proyecto').append(new Option(optionText, optionValue));
            $('#fkID_proyecto').val(optionValue);
            alert('Guardado el proyecto');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion guardar cetap
    $("#btn_guardar_cetap").click(function(){
        validar_cetap();
        return false;
    });

    //Funcion para validar cetap
    function validar_cetap(){
        nombre_cetap = $("#nombre_cetap").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_cetap='+nombre_cetap+'&tipo=valida_cetap',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('La cetap ya esta registrada');
            $("#nombre_cetap").val("");
            $("#nombre_cetap").focus();
          } else {
            crea_cetap();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Funcion para guardar el cetap
    function crea_cetap(){
        nombre_cetap = $("#nombre_cetap").val();

        $.ajax({
          url: "../controlador/ajaxFuncionario.php",
          data: 'nombre_cetap='+nombre_cetap+'&tipo=inserta_cetap'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalCetap").removeClass("show");
          $("#modalCetap").removeClass("modal-backdrop");
          carga_cetap();
          $("#nombre_cetap").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar el registro guardado
    function carga_cetap(){

        $.ajax({
            url: "../controlador/ajaxFuncionario.php",
            data: "tipo=ultima_cetap",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_cetap"){
                    optionValue = value;
                }
                if(key == "nombre_cetap")
                    optionText = value;
            });
            $('#fkID_cetap').append(new Option(optionText, optionValue));
            $('#fkID_cetap').val(optionValue);
            alert('Guardada la CETAP');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion editar
    function evento_editar(){
        //Funcion guardar equipo
        $("[name*='btn_editar']").click(function(){
            id_funcionario = $(this).attr('data-id-funcionario');
            $("#modalFuncionarioLabel").text("Editar funcionario");
            carga_funcionario(id_funcionario);
            $("#btn_guardar_funcionario").attr("data-accion","editar");
            $("#btn_guardando").hide();
            limpiar_campos();
        });
    }

    //Funcion eliminar
    function evento_eliminar(){
        //Funcion eliminar equipo
        $("[name*='btn_eliminar']").click(function(){
            id_funcionario = $(this).attr('data-id-funcionario');
            $("#btn_eliminar_funcionario").attr("data-id-funcionario",id_funcionario);
            $("#btn_eliminando").hide();
        });

        //Funcion eliminar funcionario
        $("[name*='btn_eliminar_funcionario']").click(function(){
            id_funcionario = $(this).attr('data-id-funcionario');
            elimina_funcionario(id_funcionario);
        });
    }

    //Funcion para pasar eventos
    function carga_eventos(){
        evento_editar();
        evento_eliminar();
    }

    //Funcion para pasar eventos
    $(".paginate_button").click(function(){
        carga_eventos();
    });

    //Funcion para pasar eventos
    $("[type*='search']").keypress(function(){
        carga_eventos();
    });

  //Funcion para limpiar campos
  function limpiar_campos(){
    $("input").removeClass('is-invalid');
    $("input").removeClass('is-valid');
    $("select").removeClass('is-invalid');
    $("select").removeClass('is-valid');
  }
</script>

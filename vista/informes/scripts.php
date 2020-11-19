<script type="text/javascript">
    //Redireccion a index de informes
    $("#btn_generar").click(function(){
      carga_tabla();
    });

    //Funcion para cargar tabla con filtros
    function carga_tabla(){
      filtro_proyecto = $("#fkID_proyecto").val();
      filtro_territorial = $("#fkID_territorial").val();
      filtro_estado = $("#fkID_estado").val();
      filtro_tipo_equipo = $("#fkID_tipo_equipo").val();
      filtro_modelo = $("#fkID_modelo").val();
      filtro_marca = $("#fkID_marca").val();
      filtro_procesador = $("#fkID_procesador").val();

        $.ajax({
          url: "../controlador/ajaxInformes.php",
          data: 'filtro_proyecto='+filtro_proyecto+'&filtro_territorial='+filtro_territorial+'&filtro_estado='+filtro_estado+'&filtro_tipo_equipo='+filtro_tipo_equipo+'&filtro_modelo='+filtro_modelo+'&filtro_marca='+filtro_marca+'&filtro_procesador='+filtro_procesador+'&tipo=inventario_total',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
            console.log(data);
            contenido = '';
            contador = 0;
               $.each(data, function (ind, elem) {
                  contenido += '<tr>';
                  contenido += '<td>' +elem["nombre_proyecto"]+'</td>';
                  contenido += '<td>' +elem["nombre_territorial"]+'</td>';
                  contenido += '<td>' +elem["nombre_area"]+'</td>';
                  contenido += '<td>' +elem["persona"]+'</td>';
                  contenido += '<td>' +elem["nombre_estado_equipo"]+'</td>';
                  contenido += '<td>' +elem["nombre_tipo_equipo"]+'</td>';
                  contenido += '<td>' +elem["nombre_modelo"]+'</td>';
                  contenido += '<td>' +elem["nombre_marca"]+'</td>';
                  contenido += '<td>' +elem["nombre_procesador"]+'</td>';
                  contenido += '<td>' +elem["serial_equipo"]+'</td>';
                  contenido += '</tr>';
                  contador++;
        });
                contenido += '<tr>';
            contenido += '<td scope="col" colspan="10"><p class="text-left"><small><b>Total '+contador+' registros</b></p><p class="text-right"><em>Fecha y hora impresion :<?php echo date('Y-m-d H:i:s'); ?></em></small></p></td>';
            contenido += '</tr>';
        $("#contenidoInventario").html(contenido);
        })
        .fail(function(data) {
          $("#contenidoInventario").html('No existen registros.');
        })
        .always(function(data) {
          console.log(data);
        });
    }

  //Funcion para imprimir
  $("#btn_imprimir").click(function(){
    printDiv('tablaInventario');
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
    filtro_proyecto = $("#fkID_proyecto").val();
    filtro_territorial = $("#fkID_territorial").val();
    filtro_estado = $("#fkID_estado").val();
    filtro_tipo_equipo = $("#fkID_tipo_equipo").val();
    filtro_modelo = $("#fkID_modelo").val();
    filtro_marca = $("#fkID_marca").val();
    filtro_procesador = $("#fkID_procesador").val();
    window.location = '../vista/informes/excel_inventario.php?filtro_proyecto='+filtro_proyecto+'&filtro_territorial='+filtro_territorial+'&filtro_estado='+filtro_estado+'&filtro_tipo_equipo='+filtro_tipo_equipo+'&filtro_modelo='+filtro_modelo+'&filtro_marca='+filtro_marca+'&filtro_procesador='+filtro_procesador+'&tipo=inventario_total';
      return false;
    });

  //Funcion para exportar a PDF
  $("#btn_pdf").click(function(){
    filtro_proyecto = $("#fkID_proyecto").val();
    filtro_territorial = $("#fkID_territorial").val();
    filtro_estado = $("#fkID_estado").val();
    filtro_tipo_equipo = $("#fkID_tipo_equipo").val();
    filtro_modelo = $("#fkID_modelo").val();
    filtro_marca = $("#fkID_marca").val();
    filtro_procesador = $("#fkID_procesador").val();
    window.location = '../vista/informes/pdf_inventario.php?filtro_proyecto='+filtro_proyecto+'&filtro_territorial='+filtro_territorial+'&filtro_estado='+filtro_estado+'&filtro_tipo_equipo='+filtro_tipo_equipo+'&filtro_modelo='+filtro_modelo+'&filtro_marca='+filtro_marca+'&filtro_procesador='+filtro_procesador+'&tipo=inventario_total';
      return false;
    });
</script>

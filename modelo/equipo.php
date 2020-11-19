<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Equipo
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los equipos
    public function getEquipos($permisosConsulta)
    {
        if ($permisosConsulta[0]["fkID_cargo"] == 1) {
            $url = "";
        }
        if ($permisosConsulta[0]["fkID_cargo"] == 2) {
            $url = " AND fkID_proyecto= '" . $permisosConsulta[0]['fkID_proyecto'] . "'";
        }
        if ($permisosConsulta[0]["fkID_cargo"] == 3) {
            $url = " AND fkID_persona_a_cargo = '" . $permisosConsulta[0]['fkID_persona'] . "'";
        }

        $query = "SELECT * FROM equipo
                INNER JOIN tipo_equipo ON tipo_equipo.id_tipo_equipo = equipo.fkID_tipo_equipo
                INNER JOIN modelo ON modelo.id_modelo = equipo.fkID_modelo
                INNER JOIN marca ON marca.id_marca = equipo.fkID_marca
                INNER JOIN procesador ON procesador.id_procesador = equipo.fkID_procesador
                INNER JOIN estado_equipo ON estado_equipo.id_estado_equipo = equipo.fkID_estado
                INNER JOIN inventario ON inventario.fkID_equipo = equipo.id_equipo
                LEFT JOIN asignar ON asignar.fkID_equipo = equipo.id_equipo
                WHERE equipo.estado = 1" . $url;
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario, $id_modulo)
    {
        $query = "select permisos.* FROM `permisos`
                    INNER JOIN persona on persona.fkID_cargo = permisos.fkID_cargo
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los tipos de equipos
    public function getTipoEquipo()
    {
        $query = "SELECT * FROM tipo_equipo
                ORDER BY nombre_tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los modelos
    public function getModelo()
    {
        $query = "SELECT * FROM modelo
                ORDER BY nombre_modelo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las marcas
    public function getMarca()
    {
        $query = "SELECT * FROM marca
                ORDER BY nombre_marca";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los procesadores
    public function getProcesador()
    {
        $query = "SELECT * FROM procesador
                ORDER BY nombre_procesador";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae la RAM
    public function getRam()
    {
        $query = "SELECT * FROM ram
                ORDER BY nombre_ram";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el sistema operativo
    public function getSistemaOperativo()
    {
        $query = "SELECT * FROM sistema_operativo
                ORDER BY nombre_sistema_operativo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo equipo
    public function insertaEquipo($data)
    {
        //Pasa el serial a mayusculas
        $serial = strtoupper($data['serial_equipo']);
        //Pasa las observaciones a mayusculas
        $observaciones = strtoupper($data['observaciones_equipo']);
        $query         = "INSERT INTO equipo (serial_equipo,fkID_tipo_equipo,fkID_modelo,fkID_marca,fkID_procesador, observaciones_equipo,fkID_estado,fkID_ram,fkID_sistema_operativo) VALUES ('" . $serial . "', '" . $data['fkID_tipo_equipo'] . "', '" . $data['fkID_modelo'] . "', '" . $data['fkID_marca'] . "', '" . $data['fkID_procesador'] . "', '" . $observaciones . "','1','" . $data['fkID_ram'] . "','" . $data['fkID_sistema_operativo'] . "')";
        $result        = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar equipo
    public function consultaEquipo($data)
    {
        $query = "SELECT * FROM equipo
                WHERE id_equipo = '" . $data['id_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un equipo
    public function editaEquipo($data)
    {
        //Pasa el serial a mayusculas
        $serial = strtoupper($data['serial_equipo']);
        //Pasa las observaciones a mayusculas
        $observaciones = strtoupper($data['observaciones_equipo']);
        $query         = "UPDATE equipo SET serial_equipo = '" . $serial . "',fkID_tipo_equipo = '" . $data['fkID_tipo_equipo'] . "',fkID_modelo = '" . $data['fkID_modelo'] . "',fkID_marca = '" . $data['fkID_marca'] . "' ,fkID_procesador = '" . $data['fkID_procesador'] . "', observaciones_equipo = '" . $observaciones . "', fkID_ram = '" . $data['fkID_ram'] . "', fkID_sistema_operativo = '" . $data['fkID_sistema_operativo'] . "'  WHERE id_equipo = '" . $data['id_equipo'] . "'";
        $result        = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un equipo
    public function eliminaLogicoEquipo($data)
    {
        $query  = "UPDATE equipo SET estado = '2' WHERE id_equipo = '" . $data['id_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID
    public function getIdEquipo()
    {
        $query  = "SELECT * FROM `equipo` ORDER BY `equipo`.`id_equipo` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Inserta en inventario
    public function insertaInventario($data)
    {
        //Consulta el ultimo ID de equipo
        $id_equipo = $this->getIdEquipo();
        $query     = "INSERT INTO inventario (fkID_equipo,fkID_persona_a_cargo,obs_inventario) VALUES ('" . $id_equipo[0]["id_equipo"] . "','1','CREACIÓN DE EQUIPO')";
        $result    = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Inserta en historico
    public function insertaHistorico($data)
    {
        //Consulta el ultimo ID de equipo
        $id_equipo = $this->getIdEquipo();
        //Consecutivo del movimiento
        $movimiento = $this->getConsecutivo(6);
        //Armar el consecutivo
        $contador    = $movimiento[0]["conse_tipo_movimiento"] + 1;
        $consecutivo = $movimiento[0]["inicial_tipo_movimiento"] . '-' . $contador;
        //Suma 1 al tipo de movimiento
        $this->sumaConsecutivo($contador, 6);

        $query  = "INSERT INTO historico_equipo (fkID_equipo,fkID_persona_entrega,fkID_persona_recibe,fecha_historico_equipo,fkID_tipo_movimiento,conse_historico_equipo,obs_historico_equipo) VALUES ('" . $id_equipo[0]["id_equipo"] . "','1','1',NOW(),'6','" . $consecutivo . "','CREACIÓN DE EQUIPO')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Arma el consecutivo
    public function getConsecutivo($fkID_tipo_movimiento)
    {
        $query  = "SELECT * FROM `tipo_movimiento` WHERE id_tipo_movimiento =  '" . $fkID_tipo_movimiento . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Suma 1 al consecutivo
    public function sumaConsecutivo($valor, $id_tipo_movimiento)
    {
        $query  = "UPDATE tipo_movimiento SET conse_tipo_movimiento = '" . $valor . "' WHERE id_tipo_movimiento = '" . $id_tipo_movimiento . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Valida el serial
    public function validaSerial($data)
    {
        if ($data['id_equipo'] == 0) {
            $where = "";
        } else {
            $where = " AND id_equipo != '" . $data['id_equipo'] . "'";
        }
        $query  = "SELECT COUNT(*) AS cantidad FROM `equipo` WHERE serial_equipo =  '" . $data['serial_equipo'] . "' AND estado = 1" . $where;
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el tipo equipo
    public function validaTipoEquipo($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `tipo_equipo` WHERE nombre_tipo_equipo =  '" . $data['nombre_tipo_equipo'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo tipo equipo
    public function insertaTipoEquipo($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_tipo_equipo']);
        $query  = "INSERT INTO tipo_equipo (nombre_tipo_equipo) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de tipo equipo
    public function ultimoTipoEquipo()
    {
        $query  = "SELECT id_tipo_equipo,nombre_tipo_equipo FROM `tipo_equipo` ORDER BY `tipo_equipo`.`id_tipo_equipo` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el modelo
    public function validaModelo($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `modelo` WHERE nombre_modelo =  '" . $data['nombre_modelo'] . "' AND estado = 1 AND fkID_marca = '" . $data["fkID_marca"] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo modelo
    public function insertaModelo($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_modelo']);
        $query  = "INSERT INTO modelo (nombre_modelo,fkID_marca) VALUES ('" . $nombre . "','" . $data["fkID_marca"] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de modelo
    public function ultimoModelo()
    {
        $query  = "SELECT id_modelo,nombre_modelo FROM `modelo` ORDER BY `modelo`.`id_modelo` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el marca
    public function validaMarca($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `marca` WHERE nombre_marca =  '" . $data['nombre_marca'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo procesador
    public function insertaMarca($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_marca']);
        $query  = "INSERT INTO marca (nombre_marca) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de procesador
    public function ultimaMarca()
    {
        $query  = "SELECT id_marca,nombre_marca FROM `marca` ORDER BY `marca`.`id_marca` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el procesador
    public function validaProcesador($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `procesador` WHERE nombre_procesador =  '" . $data['nombre_procesador'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo procesador
    public function insertaProcesador($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_procesador']);
        $query  = "INSERT INTO procesador (nombre_procesador) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de procesador
    public function ultimoProcesador()
    {
        $query  = "SELECT id_procesador,nombre_procesador FROM `procesador` ORDER BY `procesador`.`id_procesador` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el equipo por ID
    public function getEquipoID($id_equipo)
    {
        $query = "SELECT * FROM equipo
                INNER JOIN tipo_equipo ON tipo_equipo.id_tipo_equipo = equipo.fkID_tipo_equipo
                INNER JOIN modelo ON modelo.id_modelo = equipo.fkID_modelo
                INNER JOIN marca ON marca.id_marca = equipo.fkID_marca
                INNER JOIN procesador ON procesador.id_procesador = equipo.fkID_procesador
                INNER JOIN estado_equipo ON estado_equipo.id_estado_equipo = equipo.fkID_estado
                INNER JOIN inventario ON inventario.fkID_equipo = equipo.id_equipo
                INNER JOIN persona ON persona.id_persona = inventario.fkID_persona_a_cargo
                INNER JOIN proyecto ON proyecto.id_proyecto = persona.fkID_proyecto
                INNER JOIN territorial ON territorial.id_territorial = persona.fkID_territorial
                INNER JOIN area ON area.id_area = persona.fkID_area
                INNER JOIN cargo ON cargo.id_cargo = persona.fkID_cargo
                WHERE equipo.estado = 1 AND id_equipo = '" . $id_equipo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el historico de un equipo
    public function getHistoricoEquipo($id_equipo)
    {
        $query = "SELECT *,CONCAT(p1.nombres_persona,' ',p1.apellidos_persona) AS entrega,CONCAT(p2.nombres_persona,' ',p2.apellidos_persona) AS recibe FROM historico_equipo
                INNER JOIN persona AS p1 ON p1.id_persona = historico_equipo.fkID_persona_entrega
                INNER JOIN persona AS p2 ON p2.id_persona = historico_equipo.fkID_persona_recibe
                INNER JOIN tipo_movimiento ON tipo_movimiento.id_tipo_movimiento = historico_equipo.fkID_tipo_movimiento
                WHERE fkID_equipo = '" . $id_equipo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consultar marca
    public function consultaModelo($data)
    {
        $query = "SELECT id_modelo,nombre_modelo FROM modelo
                WHERE fkID_marca = '" . $data['id_marca'] . "'
                ORDER BY nombre_modelo ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el ram
    public function validaRam($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `ram` WHERE nombre_ram =  '" . $data['nombre_ram'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo ram
    public function insertaRam($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_ram']);
        $query  = "INSERT INTO ram (nombre_ram) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de ram
    public function ultimaRam()
    {
        $query  = "SELECT id_ram,nombre_ram FROM `ram` ORDER BY `ram`.`id_ram` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el sistema_operativo
    public function validaSistemaOperativo($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `sistema_operativo` WHERE nombre_sistema_operativo =  '" . $data['nombre_sistema_operativo'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo sistema_operativo
    public function insertaSistemaOperativo($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_sistema_operativo']);
        $query  = "INSERT INTO sistema_operativo (nombre_sistema_operativo) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de ram
    public function ultimaSistemaOperativo()
    {
        $query  = "SELECT id_sistema_operativo,nombre_sistema_operativo FROM `sistema_operativo` ORDER BY `sistema_operativo`.`id_sistema_operativo` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisosconsulta($id_usuario)
    {
        $query = "SELECT fkID_cargo,fkID_proyecto,fkID_persona FROM `persona`
                INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}

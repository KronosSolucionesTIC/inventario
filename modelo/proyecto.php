<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Proyecto
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los proyectos registrados
    public function getProyecto($permisoconsulta)
    {
       
        $query  = "select proyecto.*,(select count(*) FROM asignar 
            WHERE asignar.fkID_tipo_movimiento=1 and id_proyecto=asignar.fkID_proyecto) as cantidad FROM `proyecto` WHERE estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el detalle del proyecto
    public function getDetalleProyecto($id_proyecto)
    {
       
        $query  = "select id_proyecto, nombre_proyecto,nombre_tipo_equipo,count(*) as canti from proyecto
                    LEFT join asignar on asignar.fkID_proyecto = proyecto.id_proyecto
                    LEFT JOIN equipo on equipo.id_equipo = asignar.fkID_equipo
                    left JOIN tipo_equipo on tipo_equipo.id_tipo_equipo = equipo.fkID_tipo_equipo
                    WHERE id_proyecto= '" . $id_proyecto . "' group by nombre_tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario,$id_modulo)
    {
        $query  = "select permisos.* FROM `permisos`
                    INNER JOIN persona on persona.fkID_cargo = permisos.fkID_cargo
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisosconsulta($id_usuario)
    {
        $query  = "select fkID_cargo,fkID_proyecto FROM `persona`
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo proyecto
    public function insertaProyecto($data)
    {   
        $query  = "insert into `proyecto`(`nombre_proyecto`) VALUES ('" . strtoupper($data['nombre_proyecto'])."')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Inserta las territoriales del proyecto
    public function insertaTerritorial($data)
    {   
        $query  = "INSERT INTO `territorial_proyecto`(`fkID_territorial`, `direccion_territorial`, `fkID_proyecto`) VALUES ('" . $data['fkID_territorial']."','" . strtoupper($data['direccion_territorial']) ."','" . $data['fkID_proyecto'] ."')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Trae las territoriales
    public function getTerritorial($data)
    {
        $query  = "select id_territorial,nombre_territorial FROM `territorial_proyecto` 
                    INNER join territorial on id_territorial=fkID_territorial
                    INNER JOIN proyecto on id_proyecto=fkID_proyecto
                    WHERE territorial_proyecto.estado=1 and id_proyecto= '" . $data['id_territorial'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    public function getTerritoriales()
    {
        $query  = "select id_territorial,nombre_territorial FROM territorial
                    WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }


    //Elimina logico un proyecto
    public function eliminaLogicoProyecto($data)
    {
        $query  = "UPDATE `proyecto` SET estado = 2 WHERE id_proyecto = '" . $data['id_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Traer un usuario registrados
    public function consultaidProyecto($data)
    {
        $query  = "select MAX(id_proyecto) AS id FROM proyecto where estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer datos del proyecto 
    public function consultaDatosProyecto($data)
    {
        $query  = "select id_proyecto, nombre_proyecto FROM `proyecto` WHERE id_proyecto = '" . $data['id_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer datos de las territoriales del proyecto 
    public function consultaDatosTerritorial($data)
    {
        $query  = "select id_territorial_proyecto,fkID_territorial,direccion_territorial,fkID_proyecto, nombre_territorial FROM `territorial_proyecto`
            INNER JOIN territorial on id_territorial = fkID_territorial
            WHERE fkID_proyecto = '" . $data['id_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Usuario
    public function eliminaTerritorial($data)
    {
        $query  = "delete FROM `territorial_proyecto` WHERE id_territorial_proyecto = '" . $data['id_territorial_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Edita territorial del proyecto
    public function editaTerritorial($data)
    {
        
        $query  = "update `territorial_proyecto` SET `direccion_territorial`= '" . strtoupper($data['direccion_territorial']) . "' WHERE fkId_proyecto = '" . $data['fkId_proyecto'] . "' and fkID_territorial = '" . $data['fkID_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Edita territorial del proyecto
    public function editaProyecto($data)
    {
        $query  = "update `proyecto` SET `nombre_proyecto`= '" . $data['nombre_proyecto'] . "' WHERE id_proyecto = '" . $data['id_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Trae los tipos de equipos
    public function getTipoEquipo()
    {
        $query = "SELECT * FROM tipo_equipo
                ORDER BY id_tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }



}
<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Funcionario
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los funcionarios
    public function getFuncionarios()
    {
        $query = "SELECT * FROM persona
                INNER JOIN territorial ON territorial.id_territorial = persona.fkID_territorial
                INNER JOIN area ON area.id_area = persona.fkID_area
                INNER JOIN tipo_persona ON tipo_persona.id_tipo_persona = persona.fkID_tipo_persona
                INNER JOIN proyecto ON proyecto.id_proyecto = persona.fkID_proyecto
                WHERE persona.estado = 1 AND fkID_cargo = 4";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las territoriales
    public function getTerritoriales()
    {
        $query = "SELECT id_territorial,nombre_territorial FROM territorial
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las areas
    public function getAreas()
    {
        $query = "SELECT id_area,nombre_area FROM area
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el tipo de persona
    public function getTipoFuncionario()
    {
        $query = "SELECT id_tipo_persona,nombre_tipo_persona FROM tipo_persona
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los proyectos
    public function getProyectos()
    {
        $query = "SELECT id_proyecto,nombre_proyecto FROM proyecto
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las cetaps
    public function getCetap()
    {
        $query = "SELECT id_cetap,nombre_cetap FROM cetap
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo funcionario
    public function insertaFuncionario($data)
    {
        //Pasa el nombre a mayusculas
        $nombres_persona = strtoupper($data['nombres_persona']);
        //Pasa el apellido a mayusculas
        $apellidos_persona = strtoupper($data['apellidos_persona']);
        //Pasa el email a mayusculas
        $email_persona = strtoupper($data['email_persona']);
        $query         = "INSERT INTO persona (nombres_persona,apellidos_persona,documento_persona,telefono_persona, celular_persona, email_persona,fkID_territorial,fkID_area,fkID_tipo_persona,fkID_cargo, fkID_proyecto, fkID_cetap) VALUES ('" . $nombres_persona . "','" . $apellidos_persona . "','" . $data["documento_persona"] . "','" . $data["telefono_persona"] . "','" . $data["celular_persona"] . "', '" . $email_persona . "','" . $data["fkID_territorial"] . "','" . $data["fkID_area"] . "','" . $data["fkID_tipo_persona"] . "','4','" . $data["fkID_proyecto"] . "','" . $data["fkID_cetap"] . "')";
        $result        = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar funcionario
    public function consultaFuncionario($data)
    {
        $query = "SELECT * FROM persona
                WHERE id_persona = '" . $data['id_funcionario'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un funcionario
    public function editaFuncionario($data)
    {
        //Pasa el nombre a mayusculas
        $nombres_persona = strtoupper($data['nombres_persona']);
        //Pasa el apellido a mayusculas
        $apellidos_persona = strtoupper($data['apellidos_persona']);
        //Pasa el email a mayusculas
        $email_persona = strtoupper($data['email_persona']);
        $query         = "UPDATE persona SET nombres_persona = '" . $nombres_persona . "',apellidos_persona = '" . $apellidos_persona . "',email_persona = '" . $email_persona . "',documento_persona = '" . $data['documento_persona'] . "' ,telefono_persona = '" . $data['telefono_persona'] . "',celular_persona = '" . $data['celular_persona'] . "',fkID_territorial = '" . $data['fkID_territorial'] . "',fkID_area = '" . $data['fkID_area'] . "',fkID_proyecto = '" . $data['fkID_proyecto'] . "',fkID_cetap = '" . $data['fkID_cetap'] . "',fkID_tipo_persona = '" . $data['fkID_tipo_persona'] . "' WHERE id_persona = '" . $data['id_persona'] . "'";
        $result        = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un funcionario
    public function eliminaLogicoFuncionario($data)
    {
        $query  = "UPDATE persona SET estado = '2' WHERE id_persona = '" . $data['id_persona'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Valida la territorial
    public function validaTerritorial($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `territorial` WHERE nombre_territorial =  '" . $data['nombre_territorial'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea una nueva territorial
    public function insertaTerritorial($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_territorial']);
        $query  = "INSERT INTO territorial (nombre_territorial) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de territorial
    public function ultimaTerritorial()
    {
        $query  = "SELECT id_territorial,nombre_territorial FROM territorial ORDER BY territorial.`id_territorial` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el area
    public function validaArea($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `area` WHERE nombre_area =  '" . $data['nombre_area'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea una nueva area
    public function insertaArea($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_area']);
        $query  = "INSERT INTO area (nombre_area) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de area
    public function ultimaArea()
    {
        $query  = "SELECT id_area,nombre_area FROM area ORDER BY area.`id_area` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el proyecto
    public function validaProyecto($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `proyecto` WHERE nombre_proyecto =  '" . $data['nombre_proyecto'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea una nueva proyecto
    public function insertaProyecto($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_proyecto']);
        $query  = "INSERT INTO proyecto (nombre_proyecto) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de proyecto
    public function ultimoProyecto()
    {
        $query  = "SELECT id_proyecto,nombre_proyecto FROM proyecto ORDER BY proyecto.`id_proyecto` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el cetap
    public function validaCetap($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `cetap` WHERE nombre_cetap =  '" . $data['nombre_cetap'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea una nueva cetap
    public function insertaCetap($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_cetap']);
        $query  = "INSERT INTO cetap (nombre_cetap) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de cetap
    public function ultimaCetap()
    {
        $query  = "SELECT id_cetap,nombre_cetap FROM cetap ORDER BY cetap.`id_cetap` DESC LIMIT 1";
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
}

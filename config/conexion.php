<?php
class Conexion
{
    private $host;
    private $user;
    private $password;
    private $dataBase;

    public function __construct()
    {
        /* Local */

        $this->host     = "localhost"; //Host
        $this->user     = "root"; //Usuario Base de datos
        $this->password = ""; //Contraseña de usuario de base de datos
        $this->dataBase = "inventario"; //Nombre de la base de datos

        /* Servidor */
        /*
    $this->host     = "fdb23.awardspace.net"; //
    $this->user     = "3151581_app"; //Usuario Base de datos
    $this->password = "Adiegomarin1"; //Contraseña de usuario de base de datos
    $this->dataBase = "3151581_app"; //Nombre de la base de datos
     */

    }

    public function conectarse()
    {
        $enlace = mysqli_connect($this->host, $this->user, $this->password, $this->dataBase);
        if ($enlace) {
            //echo "Conexion exitosa"; //si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
        } else {
            die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        return ($enlace);
        mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
    }
}

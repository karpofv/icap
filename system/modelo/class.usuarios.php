<?php
class Usuarios{
/*
    |--------------------------------------------------------------------------
    | Metodo Agregar usuario de LDAP
    |--------------------------------------------------------------------------
    | creamos el usuario si el no existe
    |en la tabla usuarios
    */
    public function nuevoUsuario(){
        $modelo = new Conexion();		
        $conexion = $modelo->obtenerConexionMy();		
        $cedula = $_POST[ci];
        $sql = "INSERT INTO usuarios (Cedula,Codigo,Fecha) VALUES (:Cedula,:Codigo,:Fecha)";
        $preparar = $conexion->prepare($sql);
        /* esto es para proteger nuestra consulta por inyeccion sql
        * no esta terminado no me funcionó de momento. (bindParam o bindValue)
        */
        $preparar->bindValue(':Cedula',  $cedula);
        $preparar->bindValue(':Codigo',  $clavexxxemp);
        $preparar->bindValue(':Fecha',   'now()');
        if(!$preparar){
            return "Error al crear registro";
        }else{
            $preparar->execute();
            return "Registro creado con exito";
        }

    }
}
?>
<?php
Class DatosPersonales {
    function DatosEmp($cedula) {        
        $campos="Apellidos,Nombres,sexo,correo,cedula";
        $tablas="registrados";
        $consultas="cedula='$cedula'";
        $res_ =paraTodos::arrayConsulta($campos,$tablas,$consultas);
        foreach ($res_ as $row ) {
            $datosPresonales=array(Cedula=> $row[cedula], Nombres=> $row[Nombres], Apellidos=> $row[Apellidos], Foto=> $row[Foto]);
        }
        return $datosPresonales;

    }
    function DatosActualizados($cedula) {
    }
}
?>

<?php
require'extras/conexion.php';
session_start();

try{
    $sttm=$conexion->prepare('SELECT detalle_usuarios.nombre, detalle_usuarios.apellido, foro.idForo, foro.titulo, foro.cuerpo, foro.categoria, foro.fecha_foro, foro.iduser FROM foro INNER JOIN usuarios on usuarios.iduser=foro.iduser INNER JOIN detalle_usuarios ON detalle_usuarios.iduser=usuarios.iduser WHERE foro.hidden=0 and foro.categoria="Otro"');
    $sttm->execute();
    $sttm=$sttm->fetchAll();
}catch(PDOException $e){

}

require'views/bebes.view.php';

?>
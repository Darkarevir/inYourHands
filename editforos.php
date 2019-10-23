<?php
session_start();
require'extras/conexion.php';

if($_SESSION['tipo']=='AD' || $_SESSION['tipo']=='CC' || $_SESSION['tipo']='TU'){
   if(isset($_GET['id'])){
       $idf=$_GET['id'];
       try{
           $stts=$conexion->prepare('SELECT * FROM foro where idForo = ?');
           $stts->execute(array($idf));
           $row=$stts->fetch();
       }catch(PDOException $e){

       }
       require'views/editforos.view.php';
   }else{
       header('location: perfil.php');
   }

   if(isset($_POST['update'])){
       $titulo = $_POST['foro'];
       $categoria = $_POST['categoria'];
       $cuerpo = $_POST['cuerpo'];
       $idForo = $_POST['idf'];
       try{
           $sttu = $conexion->prepare('UPDATE foro set titulo = ?, cuerpo = ?, categoria = ? WHERE idForo =?');
           $sttu->execute(array($titulo,$cuerpo,$categoria,$idForo));
           header('location: perfil.php');
       }catch(PDOException $e){
           
       }
   }else{
       /*header('location: index.php');*/
   }

}


?>
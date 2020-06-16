<?php 

	$conexion=mysqli_connect('localhost','root','','dbventas');
	

	 $sql="SELECT MAX(id) FROM articulos ";
   //la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
      $result=mysqli_query($conexion,$sql);
      while ($row=mysqli_fetch_row ($result)){
            $id=$row[0];
           
         


	//obtenemos el ultimo id agregado
	$max=$id.date('is');//milisegundos
	 if ($max<10) {
                    $codigo="00000000000".$max;
                   }else  if ($max<100) {
                    $codigo="0000000000".$max;
                   }else if ($max<1000) {
                    $codigo="000000000".$max;
                   }else if ($max<10000) {
                    $codigo="00000000".$max;
                   }else if ($max<100000) {
                    $codigo="0000000".$max;
                   }else  if ($max<1000000) {
                    $codigo="000000".$max;
                   }else if ($max<10000000) {
                    $codigo="00000".$max;
                   }else if ($max<100000000) {
                    $codigo="0000".$max;
                   }else if ($max<100000000) {
                    $codigo="000".$max;
                   }else if ($max<100000000) {
                    $codigo="00".$max;
                   }else if ($max<100000000) {
                    $codigo="0".$max;
                   }else  if ($max<1000000000000) {
                    $codigo="0".$max;
                   }
	$sql="UPDATE articulos 
			set codigo='$max'
			where id='$id'";
	$result=mysqli_query($conexion,$sql);
	echo "<script>window.close();</script>";
 }
 ?>
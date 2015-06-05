<?php
$con=mysqli_connect("localhost","root","","symfony_course_bookmarks");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$obj=array();
$obj['img']="";
$obj['nombre']="";
$obj['nombre1']="";
$obj['peli']=rand(10,16);
$obj['numero']=$_REQUEST['numero'];










/*En un arreglo agregar todos los datos a
transportar al formulario */


$sql = "UPDATE fitxer SET favorito=TRUE WHERE id= '$obj[numero]'";

if ($con->query($sql) === TRUE) {
    $obj['nombre1']='2';
    mysqli_close($con);
} else {
    echo "Error updating record: " . $con->error;
    mysqli_close($con);
}



$con=mysqli_connect("localhost","root","","symfony_course_bookmarks");
$result = mysqli_query($con,"SELECT * FROM fitxer WHERE id='$obj[numero]'");

while($row = mysqli_fetch_array($result))
{



    $obj['nombre']=$row['nombre'];

}

mysqli_close($con);


//Imprimir los datos como una cadena JSON
echo json_encode($obj);

?>
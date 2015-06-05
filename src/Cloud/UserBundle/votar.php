<?php
header('Content-Type: text/html; charset=ISO-8859-1');
$con=mysqli_connect("localhost","root","","peliculas");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$peli= $_REQUEST['numero'];
echo $peli;
mysqli_query($con,"UPDATE peliculas SET votos=votos+1 WHERE id='$peli'");

mysqli_close($con);

?>
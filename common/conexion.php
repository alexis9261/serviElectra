<?php
//servidor
/*$servername="localhost";
$username="serviele_user";
$dbname="serviele_servielectra";
$password="sPD]g?aW*-.}";*/
//localhost
// $servername="localhost";
// $username="id13562744_servielectrauser";
// $password='@MG6$S+<*K~dDBe~';
// $dbname="id13562744_servielectra";


$servername="localhost";
$username="root";
$password='';
$dbname="servielectra";
// Create connection
$conn=new mysqli($servername,$username,$password,$dbname);
$conn->set_charset("utf8");
if($conn->connect_error){die("Connection failed: ".$conn->connect_error);}
//defino una variable donde se guardara la direccion inicial del proyecto
//--local--
//$root_folder="http://localhost/Rouxa/";
//--para servidor--
//$root_folder=""; // prints '/home/public_html/'
$nombrePagina="Servielectra";
$imageLogo="logo.png";

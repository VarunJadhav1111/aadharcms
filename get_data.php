<?php

session_start();
if(isset($_SESSION['IS_LOGIN'])){

$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "aadharcenter";
try{
	$con=new PDO("mysql:host=$mysql_db_hostname;dbname=$mysql_db_database","$mysql_db_user","$mysql_db_password");
}catch(PDOExection $e){
	echo $e->getMessage();
}
$id=$_POST['id'];
$type=$_POST['type'];

if($type=='village'){
	$sql="select id,name from village where taluka_id='$id'";
}else{
	$sql="select id,name from taluka where district_id='$id'";
}
$stmt=$con->prepare($sql);
$stmt->execute();
$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
$html='';
foreach($arr as $list){
	$html.='<option value='.$list['id'].'>'.$list['name'].'</option>';
}
echo $html;

}else{
	header('location:index.php');
	die();
}
?>
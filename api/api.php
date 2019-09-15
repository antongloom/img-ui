<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

$server = "localhost"; 
$username = "antongek_form"; 
$password = "antongloom777"; 
$dbname = "antongek_form"; 
$charset = 'utf8';


$conn = new mysqli($server, $username, $password, $dbname);

if($conn->connect_error){
	die("Ошибка соединения".$conn->connect_error);
}

if(!$conn->set_charset($charset)){
	echo "Ошибка установки кодировки UTF8";
}

$res = array('error' => false);





	
	$query = $conn->query("SELECT * FROM images ORDER BY id DESC");
	$picters = array();
	while($row = $query->fetch_assoc()){
		$show = 'data:image/jpeg;base64,'.base64_encode($row['img']);
		array_push($picters, $show);
	
	
	
	
	}

	$res['picters'] = $picters;



	
	
	$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();
	
	
	?>
	






	
	

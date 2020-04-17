<?php
$conn=mysqli_connect('localhost', 'root', '','karekilit');
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$response=array();
if(isset($_GET['imei'])) {
	$imei=$_GET['imei'];
}
$sql = "SELECT tel_no,okul_kodu,imei,kayit_tarihi,bitis_tarihi FROM kullanici WHERE imei = '" . $imei ."'" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $response['cevap']='1';
		$response['tel_no']=$row['tel_no'];
		$response['okul_kodu']=$row['okul_kodu'];
		$response['imei']=$row['imei'];
		$response['kayit_tarihi']=$row['kayit_tarihi'];
		$response['bitis_tarihi']=$row['bitis_tarihi'];
	
    }
} else {
    
	$response['cevap']='0';

}
echo json_encode($response);
mysqli_close($conn);
?>
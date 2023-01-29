<?php

sleep(1);
function getMessageAndDie($text,$class = 'success'){
    echo "<p class='$class'>$text</p>";
    die();
}


$province = $_POST['province'];

if(strlen($province) < 3){
    getMessageAndDie("اسم استان جدید باید حداقل 3 حرف باشه","error");
}

# MySQLi Connect
$mysqli = new mysqli("localhost","root","","iran");
# Check The Connection
if ($mysqli->connect_errno) {
    getMessageAndDie("Failed to connect to MySQL: " . $mysqli->connect_error,"error");
}
# connection is ok here !
// echo "Successfully connected to Database !" . PHP_EOL;
# Set Charset
$mysqli->set_charset("utf8");

$stmt = $mysqli->prepare("INSERT INTO province (name) VALUES (?)");
$stmt->bind_param('s',$province);
$stmt->execute();
$stmt->close();

getMessageAndDie("استان $province با موفقیت به ایران اضافه شد.","success");


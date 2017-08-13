<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<?php
if(isset($_POST["data_to_send"])) {
    $data_received =  $_POST["data_to_send"];
    echo $data_received;
    exit(); 
}
?>
</body>
</html>
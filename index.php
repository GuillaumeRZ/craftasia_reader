<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="//cdn.muicss.com/mui-0.9.21/css/mui.min.css" rel="stylesheet" type="text/css" />
	<link href="style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.21/js/mui.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

<h1>Function reader</h1>

<?php
// Read all the subdirectories and files stocked into the param $currentdir
function listdir($currentdir){
    $dir = opendir($currentdir);
    $file = readdir($dir);
    echo "<optgroup label='$currentdir'>";
    do {
        if (is_dir($currentdir."/".$file) && $file != "." && $file != ".."){
            listdir($currentdir."/".$file);
            echo $currentdir."/".$file;
        } else if($file != "." && $file != "..") {
            echo "<option value='$currentdir/$file'>$file</option>";
        } else {
            continue;
        }
    } while($file = readdir($dir));
    echo "</optgroup>";
    closedir($dir); 
}
echo '<select name="filesList" id="filesList">';
// Personnalize that with your own path:
listdir('functions');
echo '</select>';
?>

<div class="mui-textfield">
	<textarea name="fileEdition" id="fileEdition" placeholder="Vos fonctions..."></textarea>
</div>
<button class="mui-btn mui-btn--primary" id="saveFile">Save this version</button>

<div id='result'></div>

<script src="script.js"></script>
</body>

</html>

<html>
<body>
<?php

echo "file name : ",$_FILES["input_img"]["name"], "<BR>";
echo "mime type : ",$_FILES["input_img"]["type"], "<BR>";
echo "file size : ",$_FILES["input_img"]["size"], "<BR>";
echo "temp name : ",$_FILES["input_img"]["tmp_name"], "<BR>";
echo "error cod : ",$_FILES["input_img"]["error"], "<BR>";


$filename = "./pictures/".$_FILES["input_img"]["name"];
if($_FILES["input_img"]["size"]==0){
	echo "cannot upload file";
}else{
	if(move_uploaded_file($_FILES["input_img"]["tmp_name"],$filename) == true){
		echo "upload finish", "<BR>";
	}else{
		echo "upload failed", "<BR>";
		print_r($_FILES);
	}
}
exec('python3 detect.py',$output, $return);


if(!$return){
	echo "Successfully";
	echo "<BR>";
			foreach ($output as $line){
					echo "$line\n";
			}
	print_r($output);
}else{
	echo "fail";
}


?>
</body>
</html>

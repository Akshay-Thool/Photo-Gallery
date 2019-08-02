<!DOCTYPE html>
<html>
<head>
	<title>Add multiple images using php</title>
</head>
<body>

<form action="#" method="post" enctype="multipart/form-data">
	<input type="file" name="img[]" multiple="">
	<input type="submit" name="submit">
</form>

<?php 

$Connection=mysql_connect('localhost','root','');
$Selected=mysql_select_db('phppro',$Connection);
if (isset($_POST['submit'])) 
{
	$filename=$_FILES['img']['name'];
	$tmpname=$_FILES['img']['tmp_name'];
	$filetype=$_FILES['img']['type'];

	for ($i=0; $i <=count($tmpname)-1 ; $i++) 
	{ 
		$name=addslashes($filename[$i]);
		$tmp=addslashes(file_get_contents($tmpname[$i]));
		mysql_query("INSERT INTO img(name,image) VALUES ('$name','$tmp')");
	}
}

$res=mysql_query("SELECT * FROM img");
while ($row=mysql_fetch_array($res)) 
{
	echo '  <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="250" height="250">  ';
}

 ?>


</body>
</html>
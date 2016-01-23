
<?php
	$namee="index.php";
	$file = fopen($namee, "r") or exit("Unable to open file!");
	while(!feof($file))
	{
		echo htmlentities(fgets($file));
	}
?>

<style type="text/css">

#load_content{

	text-align:center;

}



</style>

<!--body bgcolor="#F0EFD5"></body-->
<style type="text/css"> #mhgallery img { display:none; } </style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="../main_scripts.js"></script>

<div id="load_header">



<?php

$event=scandir("gallery");

$n=count($event);

for($i=2;$i<$n;$i++)

{

	if(is_dir("gallery/".$event[$i]))

	{ 	
		$inside=scandir("gallery/".$event[$i]);
		if(is_dir("gallery/".$event[$i]."/".$inside[2]))
		{
		echo "<button style='border:0px; background:transparent;cursor:pointer; ' onclick='load_dirs(\"".$event[$i]."\",1);'><img src='../images/indexsd.jpg' style='width:30px;height:30px;'/> ".$event[$i]."</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		else
		{
			echo "<button style='border:0px; background:transparent;cursor:pointer; ' onclick='load_dirs(\"".$event[$i]."\",0);'><img src='../images/indexsd.jpg' style='width:30px;height:30px;'/> ".$event[$i]."</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}

	}

}

?>

</div>

<div id="load_content" style="display:none;">

</div>

<center>

<div id="load_gallery"></div>

</center>

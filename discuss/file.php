<html>
	<script type="text/javascript" src="jquery.js"></script>
	<textarea cols=50 rows=10 id="content"></textarea>
	<script type="text/javascript">
		$.post("file1.php",function(data){
			$('#content').html(data);
		});
		
	</script>
</html>

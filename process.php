<!--
	This page gets and processes account data from trackanalytics.com and 
	sends it to another page via form to be used in the game.
-->

<!DOCTYPE html>
<html>
<head>
	<title>Loading...</title>
	<meta charset="utf-8"/>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<?php
		$site = $_POST["site"];
		require "getData.php";
		store($site, 1);
		
		$form = "";
		$form .= '<form id="form" method="post" action="game.php">';
		$form .= '<input value="'.$_POST["desc"].'" name="desc" type="hidden">';
		$form .= '<input id="names" name="names" type="hidden">';
		$form .= '<input id="counts" name="counts" type="hidden">';
		$form .= '</form>';
		echo $form;
	?>
	<script>
		window.onload = function()
		{
			var index = 0;
			var nameStr = "";
			var countStr = "";
			$('[style="margin-left:10px;"]').each(function()
			{
				var name = $(this).html();
				var countHTML = $(this).parent().parent().next().html();
				var count = countHTML.substring(0, countHTML.indexOf("<br>") - 1).replace(/,/g, "");
				if (index != 0)
				{
					nameStr += ",";
					countStr += ",";
				}
				nameStr += name;
				countStr += count;
				index++;
			});
			
			document.getElementById("names").value = nameStr;
			document.getElementById("counts").value = countStr;
			document.getElementById("form").submit();
		}
	</script>
</head>
<body>
	<form id="form" method="post" action="game.php">
		<input id="names" name="names" type="hidden">
		<input id="counts" name="counts" type="hidden">
	</form>
</body>
</html>

<?php
$get_string = "";
$enable_protection = false;

if(isset($_GET['xss_string']))
{
	$get_string = $_GET['xss_string'];
}
if(isset($_GET['protect']))
{
	$enable_protection = filter_var($_GET['protect'], FILTER_VALIDATE_BOOLEAN);
}

if($enable_protection)
		$get_string = htmlentities($get_string);
?>

<!DOCTYPE html>
<html>

<head>
	<title>XSS Example</title>
</head>

<body>
	<p>There are two parameters for "index.php". "xss_string" for the xss string. "protect" boolean value for enabling protection</p>
	<form action="./index.php" method="GET">
		<label for="xss_string">Xss String: </label>
		<input type="text" maxlenght="50" name="xss_string" value="<?php echo $get_string; ?>" />

		<label for="protection">Protection: </label>
		<select name="protect">
			<option value="1"<?php echo ($enable_protection) ? ' selected="selected"' : ""; ?>>True</option>
			<option value="0"<?php echo (!$enable_protection) ? ' selected="selected"' : ""; ?>>False</option>
		</select>

		<input type="Submit" value="Submit Options">
	</form>
	<h4>Protection is: <span style="color: red; font-size: 12px;"> <?php echo ( $enable_protection) ? 'Enabled' : 'Disabled'; ?></span></h4>
	<h4>Output from "xss_string":</h4>
	<code style="background-color: #CCC; padding: 10px;">
		<?php echo $get_string; ?>
	</code>
	<button onclick="location.reload();" style="margin-top: 10px;">Reload Page</button>
</body>

</html>

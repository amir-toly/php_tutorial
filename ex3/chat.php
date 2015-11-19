<?php

$page_number = -1;

if (isset($_GET['page']))
{
	$page_number = (int) $_GET['page'];
}

if ($page_number < 1)
{
	$page_number = 1; // Display first page by default
}

$offset = ($page_number - 1) * 10;

try
{
	$db = new PDO(
		'mysql:host=localhost;dbname=test;',
		'root',
		'',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
}
catch (Exception $e)
{
	die('ERROR: ' . $e->getMessage());
}

//TODO(find a way to use an integer in prepared statement)
$response = $db->query('SELECT nickname, message FROM chat ORDER BY id DESC LIMIT ' . $offset . ', 10');

$nickname = '';

if (isset($_COOKIE['nickname']))
{
	$nickname = $_COOKIE['nickname'];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8" />
		<title>Chat</title>
	</head>
	
	<body>
		<form action="chat_post.php" method="post">
			Nickname:
			<br/>
			<input type="text" name="nickname" value="<?php echo $nickname; ?>" />
			<br/>
			Message:
			<br/>
			<textarea name="message"/></textarea>
			<br/>
			<input type="submit" value="Send" />
		</form>
		
		<p><a href="chat.php">Refresh</a></p>
		
		<?php while ($data = $response->fetch()) { ?>
			<p>
				<strong><?php echo htmlspecialchars($data['nickname']); ?>:</strong>
				<?php echo htmlspecialchars($data['message']); ?>
			</p>
		<?php } ?>
	</body>
</html>

<?php

$response->closeCursor();

?>


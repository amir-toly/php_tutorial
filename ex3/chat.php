<?php

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

$response = $db->query('SELECT nickname, message FROM chat ORDER BY id DESC');

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
			<input type="text" name="nickname" />
			<br/>
			Message:
			<br/>
			<textarea name="message"/></textarea>
			<br/>
			<input type="submit" value="Send" />
		</form>
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


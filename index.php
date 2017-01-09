<!DOCTYPE html>
<html>
	<?php
		$info = include 'includes/siteInfo.php';
	?>
	<head>
		<meta charset="<?= $info['charset'] ?>">
		<title>
			<?= $info['name'] ?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?= 'themes/', $info['theme'], '/style.css' ?>"/>
		<link rel="stylesheet" type="text/css" href="<?= 'themes/', $info['theme'], '/rtl.css' ?>"/>
		<script type="text/javascript" rel="script" src="<?= 'themes/', $info['theme'], '/script.js' ?>"></script>
		<script type="text/javascript" rel="script" src="script.js"></script>
	</head>
	<body>
		<?php
			require_once('themes/' . $info['theme'] . '/index.php');
			if (isset($_POST['url'])) {
				include 'includes/DB_API/Urls.php';
				// TODO:Check signed in user .
				// null value is for visitor
				$userId = null;
				$urlObj = new Urls();
				try {
					$alias = $urlObj->scut_urls_add($userId, $_POST['url']);
					header('Location: ?result='.$alias);
				} catch (Exception $exception) {
					header('Location: ?err=Error : ' . $exception->getMessage());
				}
			}
			if (isset($_GET['u'])) {
				$config = require('config.php');
				$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' .
					$config['database'], $config['user'], $config['pass']);
				$sql = $db->prepare('SELECT link FROM urls WHERE alias = :alias');
				$sql->execute(array(':alias' => $_GET['u']));

				header('Location: http://' . $sql->fetch()[0]);
			}
		?>
	</body>
</html>
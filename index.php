<!DOCTYPE html>
<html>
	<?php
		$info = include 'includes/siteInfo.php';
	?>
	<head>
		<meta charset="<?= $info['charset'] ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<title>
			<?= $info['name'] ?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?= 'themes/', $info['theme'], '/style.css' ?>"/>
		<link rel="stylesheet" type="text/css" href="<?= 'themes/', $info['theme'], '/rtl.css' ?>"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" rel="script" src="<?= 'themes/', $info['theme'], '/script.js' ?>"></script>
		<script type="text/javascript" rel="script" src="script.js"></script>


	</head>
	<body>
		<?php
			include_once 'includes/nav.php';
		?>
		<div id="homeContent">
			<?php
				include_once 'includes/header.php';
				include_once 'includes/form.php';
			?>
		</div>
		<?php
			include_once 'includes/footer.php';
			include 'includes/DB_API/Urls.php';
			$urlObj = new Urls();
			if (isset($_POST['url'])) {
				// TODO:Check signed in user .
				// null value is for visitor
				$userId = null;
				try {
					$alias = $urlObj->scut_urls_add($userId, $_POST['url']);
					header('Location: ?result=' . $alias);
				} catch (Exception $exception) {
					header('Location: ?err=Error : ' . $exception->getMessage());
				}
			}

			if (isset($_GET['u']))
				$urlObj->scut_urls_redirect();
			include 'includes/mobileMenu.php';

			//include 'includes/signIn.php'
		?>

	</body>
</html>
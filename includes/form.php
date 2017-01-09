<?php
	if (isset($_GET['result'])):?>
		<input type="text" class="copyText" value="<?= str_replace('index.php?result', '?u',
			'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>" readonly>
		<input type="button" class="copyBtn" value="Copy url">
		<input type="button" onclick="home()" value="Return to home">
		<?php
	elseif (isset($_GET['err'])):?>
		<input type="text" value="<?=$_GET['err']?>" style="color: #f00;" readonly>
		<input type="button" onclick="home()" value="Return to home">
	<?php else: ?>
		<form method="POST">
			<input type="text" name="url" placeholder="Insert your URL">
			<input type="submit" value="Get short URL">
		</form>
	<?php endif; ?>
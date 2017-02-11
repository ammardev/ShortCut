<div id="homeForm">
<?php
	if (isset($_GET['result'])):?>
		<input type="text" class="copyText" value="<?= str_replace('index.php','',
			str_replace('?result', '?u',
			'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])) ?>" readonly>
		<input type="button" class="copyBtn" value="Copy url">
		<input type="button" value="Return to home">
		<?php
	elseif (isset($_GET['err'])):?>
		<input type="text" value="<?=$_GET['err']?>" style="color: #f00;" readonly>
		<input type="button" value="Return to home">
	<?php else: ?>
			<input id="urlText" type="text" placeholder="Insert your URL">
			<input type="submit" value="Get short URL">
	<?php endif; ?>
</div>

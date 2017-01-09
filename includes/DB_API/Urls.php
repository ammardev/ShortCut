<?php

	class Urls
	{
		private $handle = null;
		private $config = null;

		function __construct() {
			$this->config = include 'config.php';
		}

		private function connect(): bool {
			$result = true;

			try {

				$this->handle = new PDO('mysql:host=' . $this->config['host'] .
					';dbname=' . $this->config['database'], $this->config['user'],
					$this->config['pass']);
				$this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $exception) {
				$result = false;
			}

			return $result;
		}

		private function aliasCreator(): string {
			$alias = '';
			for ($i = 0; $i < 7; $i++) {
				$num = rand(48, 122);
				if ($num < 57 or ($num < 91 and $num > 64) or $num > 96)
					$alias .= chr($num);
				else
					$i--;
			}

			return $alias;
		}

		private function urlChecker($url) {
			$url = str_replace('https://', '', str_replace(
				'http://', '', str_replace(' ', '', $url)));
			if (!empty($url)) return $url;
			else return false;
		}

		public function scut_urls_add($userId, $url) {
			if ($this->connect()) {
				$checkedUrl = $this->urlChecker($url);
				if ($checkedUrl !== false) {
					$alias = $this->aliasCreator();
					$sql = $this->handle->prepare('INSERT INTO urls(userid,alias,link) VALUES (:id,:alias,:link)');
					$sql->bindParam(':id', $userId);
					$sql->bindParam(':alias', $alias);
					$sql->bindParam(':link', $checkedUrl);

					$sql->execute();

					return $alias;
				} else throw new Exception('Url is not valid .');
			} else throw new Exception('Can not connect to the database .');
		}

		function __destruct() {
			unset($this->handle);
		}

	}
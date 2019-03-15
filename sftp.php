<?php

require __DIR__ . '/vendor/autoload.php';

use phpseclib\Net\SFTP;

$sftp = new SFTP('localhost');

if (!$sftp->login('travis', '')) {
	throw new Exception('Login failed');
}

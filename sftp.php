<?php

require __DIR__ . '/vendor/autoload.php';

use phpseclib\Crypt\RSA;
use phpseclib\Net\SFTP;

$sftp = new SFTP('localhost');

$Key = new RSA();
// If the private key has a passphrase we set that first
$Key->setPassword('');
// Next load the private key using file_gets_contents to retrieve the key
$Key->loadKey(file_get_contents('/home/travis/.ssh/id_rsa'));

if (!$sftp->login('travis', $Key)) {
	throw new Exception('Login failed');
}

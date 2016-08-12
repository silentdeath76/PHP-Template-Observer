<?php
	global $pdo;

	require "bootstrap.php";

	$pdo_set = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "test";

	$pdo = new PDO( sprintf( "mysql:host=%s;dbname=%s", $hostname, $database ), $username, $password, $pdo_set );

	/* @var Login $login */
	$app = appLoader( "login" );


	$login = new $app( "test", "5f4dcc3b5aa765d61d8327deb882cf99", "127.0.0.1" );
	$login->addObserver( new SuccessAuth(), $login::USER_AUTH );
	$login->addObserver( new FailAuth(), $login::USER_WRONG_PASSWORD );
	$login->addObserver( new NotAuth(), $login::USER_NOT_LOGIN );
	$login->validate();

	$login->setUsername( "test" )->setPassword( "fail" )->setIp( "127.0.0.1" );
	$login->validate();

	$login->setUsername( null )->setPassword( null )->setIp( "127.0.0.1" );
	$login->validate();
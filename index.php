<?php
	require "bootstrap.php";

	/* @var Login $login */
	$app = appLoader( "login" );
	DB::getInstance("localhost", "root", null, "test"); // create first connect for - pattern Singleton

	$login = new $app( "test", "5f4dcc3b5aa765d61d8327deb882cf99", "127.0.0.1" );
	$login->addObserver( new SuccessAuth(), $login::USER_AUTH );
	$login->addObserver( new FailAuth(), $login::USER_WRONG_PASSWORD );
	$login->addObserver( new NotAuth(), $login::USER_NOT_LOGIN );
	$login->validate();

	$login->setUsername( "test" )->setPassword( "fail" )->setIp( "127.0.0.1" );
	$login->validate();

	$login->setUsername( null )->setPassword( null )->setIp( "127.0.0.1" );
	$login->validate();
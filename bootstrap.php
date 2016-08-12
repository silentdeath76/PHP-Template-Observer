<?php

	// app loader
	/** @noinspection PhpInconsistentReturnPointsInspection
	 * @param string $app
	 *
	 * @return null|string
	 */
	function appLoader ($app) {
		$app = ucfirst( $app );
		$appRoot = __DIR__ . "\\app\\";
		$appExt = ".php";
		$file = $appRoot . $app . "\\" . $app . $appExt;

		if ( file_exists( $file ) ) {
			/** @noinspection PhpIncludeInspection */
			require_once $file;

			return $app;
		}
		else {
			echo $file . PHP_EOL;
			echo "Error, app not found";
		}

		return null;
	}

	// core loader
	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . "\\core\\interfaces\\IObservable.php";
	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . "\\core\\interfaces\\IObserver.php";

	// services loader
	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . "\\services\\login\\SuccesAuth.php";
	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . "\\services\\login\\FailAuth.php";
	/** @noinspection PhpIncludeInspection */
	require_once __DIR__ . "\\services\\login\\NotAuth.php";
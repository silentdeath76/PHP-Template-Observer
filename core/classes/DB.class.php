<?php

	class DB {
		public $pdo = null;
		public static $pdo_set = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

		private static $instance = null;

		public static function getInstance () {
			if ( self::$instance == null ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * DB constructor.
		 */
		private function __construct () {
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$database = "test";

			$this->pdo = new PDO( sprintf( "mysql:host=%s;dbname=%s", $hostname, $database ), $username, $password, self::$pdo_set );
		}

		private function __wakeup () { }

		private function __clone () { }
	}
<?php

	class Login implements IObservable {
		const USER_NOT_LOGIN = 0;
		const USER_AUTH = 1;
		const USER_WRONG_PASSWORD = 2;

		private $serviceArray = [];

		protected $username;
		protected $password;
		protected $ip;

		/**
		 * Login constructor.
		 * @param $username
		 * @param $password
		 * @param $ip
		 */
		public function __construct ($username, $password, $ip) {
			$this->username = $username;
			$this->password = $password;
			$this->ip = $ip;
		}

		/**
		 * @return mixed
		 */
		public function getUsername () {
			return $this->username;
		}

		/**
		 * @param mixed $username
		 * @return Login
		 */
		public function setUsername ($username) {
			$this->username = $username;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getPassword () {
			return $this->password;
		}

		/**
		 * @param mixed $password
		 * @return Login
		 */
		public function setPassword ($password) {
			$this->password = $password;

			return $this;
		}

		/**
		 * @return mixed
		 */
		public function getIp () {
			return $this->ip;
		}

		/**
		 * @param mixed $ip
		 */
		public function setIp ($ip) {
			$this->ip = $ip;
		}


		public function validate () {
			if ( is_null( $this->username ) or is_null( $this->password ) ) {
				$this->fireEvent( self::USER_NOT_LOGIN );

				return;
			}

			$stmt = DB::getInstance()->pdo->prepare( "SELECT * FROM `users` WHERE username = ?" );
			$stmt->execute( [$this->username] );

			if ( ( $row = $stmt->fetch() ) != null ) {
				if ( $row["password"] == $this->password ) {
					$this->fireEvent( self::USER_AUTH );
				}
				else {
					$this->fireEvent( self::USER_WRONG_PASSWORD );
				}
			}

			$stmt = null;
		}


		public function addObserver (IObserver $observer, $strEventType) {
			$this->serviceArray[$strEventType][] = $observer;
		}

		public function fireEvent ($strEventType) {
			if ( is_array( $this->serviceArray[$strEventType] ) ) {
				foreach ( $this->serviceArray[$strEventType] as $service ) {
					/* @var IObserver $service */
					$service->notify( $this, $strEventType );
				}
			}
		}
	}

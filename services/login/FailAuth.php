<?php

	class FailAuth implements IObserver {

		public function notify (IObservable $observable, $objArguments) {
			if ( $objArguments == Login::USER_WRONG_PASSWORD && $observable instanceof Login ) {
				echo "Error: fail auth wrong password\r\nWrite log.\r\n";
				/*print_r([
					$observable->getUsername(),
					$observable->getPassword()
				]);*/
			}
		}
	}
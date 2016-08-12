<?php

	class SuccessAuth implements IObserver {

		public function notify (IObservable $observable, $objArguments) {
			if ( $objArguments == Login::USER_AUTH && $observable instanceof Login ) {
				echo "User auth\r\n";
				/*print_r([
					$observable->getUsername(),
					$observable->getPassword()
				]);*/
			}
		}
	}
<?php

	class NotAuth implements IObserver {

		public function notify (IObservable $observable, $objArguments) {
			if ( $objArguments == Login::USER_NOT_LOGIN && $observable instanceof Login ) {
				echo "not get data\r\n";
				/*print_r([
					$observable->getUsername(),
					$observable->getPassword()
				]);*/
			}
		}
	}
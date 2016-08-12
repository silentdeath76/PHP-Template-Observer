<?php

	interface IObservable {
		public function addObserver( IObserver $observer, $strEventType );
		public function fireEvent( $strEventType );
	}
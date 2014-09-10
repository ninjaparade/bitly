<?php namespace Ninjaparade\Bitly\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Bitly extends Facade {

	/**
	 * {@inheritDoc}
	 */
	protected static function getFacadeAccessor()
	{
		return 'np_bitly';
	}

}

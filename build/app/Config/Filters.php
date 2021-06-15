<?php

namespace Config;

use App\Controllers\Login;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
        'login'    => \App\Filters\Login::class,
        'account'    => \App\Filters\Account::class,
        'Logout'   => \App\Filters\Logout::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
		//	 'csrf' => ['except' => ['/unsetTables','/usedTables','/updateProfile','/busyTables','/account/busyTables','/call','/PushSubscription','/sendpushnotification','/Add']],
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [

        'login' =>['before'=>['/login']],
        'account'=>['before'=>['/account','/profile','/tables','/usedTables','/tablesCount','/busyTable','/GetProfileDate','/account/busyTables','/sendpushnotification','/PushSubscription']],
        'Logout'=>['before'=>['/auth/logOut']],
    ];
}

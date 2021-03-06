<?php

/**
 * Test: Nette\Application\Routers\Route with FilterTable
 */

declare(strict_types=1);

use Nette\Application\Routers\Route;


require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Route.php';


$route = new Route(' ? action=<presenter>', [
	'presenter' => [
		Route::FILTER_TABLE => [
			'produkt' => 'Product',
			'kategorie' => 'Category',
			'zakaznik' => 'Customer',
			'kosik' => 'Basket',
		],
	],
]);

testRouteIn($route, '/?action=kategorie', 'Category', [
	'test' => 'testvalue',
], '/?test=testvalue&action=kategorie');

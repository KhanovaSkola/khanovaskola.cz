<?php

use Nette\Application\Routers\Route;
use Nette\Utils\Strings;

class Routes
{
	
	public function setup($container)
	{
		$container->router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);
		
		$categoryRoute = new SlugRoute('<id>[/<action>]', array(
			'id' => array(
				Route::FILTER_OUT => function ($id) use ($container) {
					if (!is_numeric($id)) {
						return $id;
						
					} else {
						return Strings::webalize($container->categories->findOneBy(['id' => $id])->label);
					}
				}
			),
			'module' => 'Front',
			'presenter' => 'Browse',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		));
		$categoryRoute->init($container, 'id', 'categories');
		$container->router[] = $categoryRoute;
		
		$videoRoute = new SlugRoute('video/<vid>[/<action>]', array(
			'vid' => array(
				Route::FILTER_OUT => function ($vid) use ($container) {
					if (!is_numeric($vid)) {
						return $vid;
						
					} else {
						return Strings::webalize($container->videos->findOneBy(['id' => $vid])->label);
					}
				}
			),
			'module' => 'Front',
			'presenter' => 'Watch',
			'action' => [
				Route::VALUE => 'default',
				Route::FILTER_TABLE => [
					'upravit' => 'edit',
				]
			],
		));
		$videoRoute->init($container, 'vid', 'videos');
		$container->router[] = $videoRoute;
		
		$exRoute = new SlugRoute('cviceni/<eid>', array(
			'eid' => array(
				Route::FILTER_OUT => function ($eid) use ($container) {
					if (!is_numeric($eid)) {
						return $eid;
						
					} else {
						return Strings::webalize($container->exercises->findOneBy(['id' => $eid])->label);
					}
				}
			),
			'module' => 'Front',
			'presenter' => 'Exercise',
			'action' => 'default',
		));
		$exRoute->init($container, 'eid', 'exercises');
		$container->router[] = $exRoute;
		
		
		//$container->router[] = new Route('<category>/<subcategory>/<vid>', 'Front:Watch:default');
		$container->router[] = new Route('<action (prihlaseni|odhlaseni)>', [
			'presenter' => 'Sign',
			'action' => [
				Route::FILTER_TABLE => [
					'prihlaseni' => 'in',
					'odhlaseni' => 'out',
				]
			]
		]);
		
		$container->router[] = new Route('moderator/<presenter>/<action>[/<id>]', [
			'module' => 'Moderator',
			'presenter' => 'Dashboard',
			'action' => 'default',
		]);
		
		$container->router[] = new Route('<presenter>/<action>[/<id>]', [
			'module' => 'Front',
			'presenter' => [
				Route::VALUE => 'Homepage',
				Route::FILTER_TABLE => [
					'cviceni' => 'Exercise',
					'registrace' => 'Registration',
					'o-skole' => 'About',
				],
			],
			'action' => 'default',
		]);
	}
	
}
